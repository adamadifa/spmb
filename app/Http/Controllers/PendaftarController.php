<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaranonline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftaranonline::latest()->paginate(10);
        return view('pendaftar.index', compact('pendaftars'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('pendaftar.create', compact('user'));
    }

    public function show(Pendaftaranonline $pendaftar)
    {
        return view('pendaftar.show', compact('pendaftar'));
    }

    public function edit(Pendaftaranonline $pendaftar)
    {
        return view('pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nisn' => 'nullable|digits:10|unique:users,nisn,' . $id,
            'nama_lengkap' => 'required|string|min:3',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|min:3',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'anak_ke' => 'required|integer|min:1|max:20',
            'jumlah_saudara' => 'required|integer|min:0|max:20',
            'alamat' => 'required|string|min:10',
            'kode_pos' => 'required|digits:5',
            'no_kk' => 'required|digits:16',
            'nik_ayah' => 'required|digits:16',
            'nama_ayah' => 'required|string|min:3',
            'pendidikan_ayah' => 'required|in:SD,SMP,SMA,D3,S1,S2,S3',
            'pekerjaan_ayah' => 'required|string|min:3',
            'nik_ibu' => 'required|digits:16',
            'nama_ibu' => 'required|string|min:3',
            'pendidikan_ibu' => 'required|in:SD,SMP,SMA,D3,S1,S2,S3',
            'pekerjaan_ibu' => 'required|string|min:3',
            'no_hp' => 'required|regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/',
            'asal_sekolah' => 'required|string|min:3',
        ]);

        $user->update($validated);

        return redirect()->route('dashboard')->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function destroy(Pendaftaranonline $pendaftar)
    {
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function cetakPdf(Pendaftaranonline $pendaftar)
    {
        // Pastikan user yang login adalah pemilik data
        if (auth()->user()->no_register !== $pendaftar->no_register) {
            abort(403);
        }

        $pdf = Pdf::loadView('pendaftar.pdf', compact('pendaftar'));

        return $pdf->stream('formulir-pendaftaran-' . $pendaftar->no_register . '.pdf');
    }
}
