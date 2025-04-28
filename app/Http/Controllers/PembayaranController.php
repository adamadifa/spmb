<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaranonline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah memiliki pembayaran
        $pembayaran = Pembayaran::where('no_register', Auth::user()->no_register)
            ->orderBy('created_at', 'desc')
            ->first();

        // Jika user adalah admin, tampilkan semua pembayaran
        // if (Auth::user()->role === 'admin') {
        //     $pembayaran = Pembayaran::with('pendaftaran')
        //         ->orderBy('created_at', 'desc')
        //         ->paginate(10);
        //     return view('pembayaran.index', compact('pembayaran'));
        // }

        // Jika user belum memiliki pembayaran, arahkan ke form pembayaran
        if (!$pembayaran) {
            return redirect()->route('pembayaran.create');
        }


        // Jika user sudah memiliki pembayaran, tampilkan detail pembayaran
        return redirect()->route('pembayaran.show', $pembayaran->id);
    }

    public function create()
    {
        $pendaftaran = Pendaftaranonline::where('no_register', Auth::user()->no_register)->first();
        return view('pembayaran.create', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|in:transfer,tunai,qris,edc',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'nullable|string'
        ]);

        // Upload bukti pembayaran
        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $path = $bukti_pembayaran->store('public/bukti_pembayaran');

        // Simpan data pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->no_register = Auth::user()->no_register;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
        $pembayaran->metode_pembayaran = $request->metode_pembayaran;
        $pembayaran->bukti_pembayaran = $path;
        $pembayaran->status = 'pending';
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $pembayaran->id)
            ->with('success', 'Konfirmasi pembayaran berhasil dikirim. Silahkan tunggu verifikasi dari admin.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('pendaftaran')->findOrFail($id);

        // Cek apakah user memiliki akses ke pembayaran ini
        if (Auth::user()->role !== 'admin' && $pembayaran->no_register !== Auth::user()->no_register) {
            abort(403);
        }

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Cek apakah user memiliki akses ke pembayaran ini
        if (Auth::user()->role !== 'admin' && $pembayaran->no_register !== Auth::user()->no_register) {
            abort(403);
        }

        // Hanya bisa edit jika status masih pending
        if ($pembayaran->status !== 'pending') {
            return redirect()->route('pembayaran.show', $id)
                ->with('error', 'Pembayaran yang sudah disetujui atau ditolak tidak dapat diubah.');
        }

        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Cek apakah user memiliki akses ke pembayaran ini
        if (Auth::user()->role !== 'admin' && $pembayaran->no_register !== Auth::user()->no_register) {
            abort(403);
        }

        // Hanya bisa update jika status masih pending
        if ($pembayaran->status !== 'pending') {
            return redirect()->route('pembayaran.show', $id)
                ->with('error', 'Pembayaran yang sudah disetujui atau ditolak tidak dapat diubah.');
        }

        $request->validate([
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|in:transfer,tunai',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'nullable|string'
        ]);

        // Update data pembayaran
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
        $pembayaran->metode_pembayaran = $request->metode_pembayaran;
        $pembayaran->keterangan = $request->keterangan;

        // Jika ada upload bukti pembayaran baru
        if ($request->hasFile('bukti_pembayaran')) {
            // Hapus file lama
            if ($pembayaran->bukti_pembayaran) {
                Storage::delete($pembayaran->bukti_pembayaran);
            }
            // Upload file baru
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $path = $bukti_pembayaran->store('public/bukti_pembayaran');
            $pembayaran->bukti_pembayaran = $path;
        }

        $pembayaran->save();

        return redirect()->route('pembayaran.show', $id)
            ->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Cek apakah user memiliki akses ke pembayaran ini
        if (Auth::user()->role !== 'admin' && $pembayaran->no_register !== Auth::user()->no_register) {
            abort(403);
        }

        // Hanya bisa hapus jika status masih pending
        if ($pembayaran->status !== 'pending') {
            return redirect()->route('pembayaran.show', $id)
                ->with('error', 'Pembayaran yang sudah disetujui atau ditolak tidak dapat dihapus.');
        }

        // Hapus file bukti pembayaran
        if ($pembayaran->bukti_pembayaran) {
            Storage::delete($pembayaran->bukti_pembayaran);
        }

        $pembayaran->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }

    public function approve($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Hanya admin yang bisa menyetujui pembayaran
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $pembayaran->status = 'approved';
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $id)
            ->with('success', 'Pembayaran berhasil disetujui.');
    }

    public function reject($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Hanya admin yang bisa menolak pembayaran
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $pembayaran->status = 'rejected';
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $id)
            ->with('success', 'Pembayaran berhasil ditolak.');
    }
}
