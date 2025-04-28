<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_online_bayar';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'no_register',
        'tanggal_pembayaran',
        'jumlah_pembayaran',
        'metode_pembayaran',
        'bukti_pembayaran',
        'status_pembayaran',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
    ];

    // Relasi dengan model Pendaftaranonline
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaranonline::class, 'no_register', 'no_register');
    }
}
