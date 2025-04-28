<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranOnline;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get greeting based on time
        $hour = Carbon::now()->hour;
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            $greeting = 'Selamat Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting = 'Selamat Sore';
        } else {
            $greeting = 'Selamat Malam';
        }

        // Get pendaftar data using PendaftaranOnline model
        $pendaftar = PendaftaranOnline::where('no_register', auth()->user()->no_register)
            ->join('unit', 'pendaftaran_online.kode_unit', '=', 'unit.kode_unit')
            ->first();

        // Registration status timeline
        $registrationStatus = [
            'pendaftaran' => [
                'status' => 'selesai',
                'message' => 'Anda telah berhasil mendaftar dan membuat akun'
            ],
            'formulir' => [
                'status' => $pendaftar && $pendaftar->formulir ? 'selesai' : 'dalam_proses',
                'message' => $pendaftar && $pendaftar->formulir
                    ? 'Formulir pendaftaran telah dilengkapi'
                    : 'Silakan lengkapi formulir pendaftaran'
            ],
            'pembayaran' => [
                'status' => $pendaftar && $pendaftar->pembayaran ? 'selesai' : 'menunggu',
                'message' => $pendaftar && $pendaftar->pembayaran
                    ? 'Pembayaran telah dikonfirmasi'
                    : 'Menunggu konfirmasi pembayaran'
            ],
            'verifikasi' => [
                'status' => $pendaftar && $pendaftar->verified ? 'selesai' : 'menunggu',
                'message' => $pendaftar && $pendaftar->verified
                    ? 'Pendaftaran telah diverifikasi'
                    : 'Menunggu verifikasi dari admin'
            ]
        ];

        return view('dashboard', compact('greeting', 'pendaftar', 'registrationStatus'));
    }
}
