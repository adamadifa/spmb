<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaranonline;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftaranonline::latest()->paginate(10);
        return view('pendaftar.index', compact('pendaftars'));
    }

    public function create()
    {
        return view('pendaftar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'nullable|string|max:11',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'anak_ke' => 'nullable|integer|min:1',
            'jumlah_saudara' => 'nullable|integer|min:0',
            'alamat' => 'nullable|string',
            'kode_pos' => 'nullable|string|max:5',
            'no_kk' => 'nullable|string|max:16',
            'nik_ayah' => 'nullable|string|max:16',
            'nama_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'nik_ibu' => 'nullable|string|max:16',
            'nama_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'asal_sekolah' => 'nullable|string|max:255',
        ]);

        Pendaftaranonline::create($validated);

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil ditambahkan.');
    }

    public function show(Pendaftaranonline $pendaftar)
    {
        return view('pendaftar.show', compact('pendaftar'));
    }

    public function edit(Pendaftaranonline $pendaftar)
    {
        return view('pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, Pendaftaranonline $pendaftar)
    {
        $validated = $request->validate([
            'nisn' => 'nullable|string|max:11',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'anak_ke' => 'nullable|integer|min:1',
            'jumlah_saudara' => 'nullable|integer|min:0',
            'alamat' => 'nullable|string',
            'kode_pos' => 'nullable|string|max:5',
            'no_kk' => 'nullable|string|max:16',
            'nik_ayah' => 'nullable|string|max:16',
            'nama_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'nik_ibu' => 'nullable|string|max:16',
            'nama_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'asal_sekolah' => 'nullable|string|max:255',
        ]);

        $pendaftar->update($validated);

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function destroy(Pendaftaranonline $pendaftar)
    {
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
