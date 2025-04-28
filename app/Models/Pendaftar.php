<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_online';

    protected $fillable = [
        'user_id',
        'no_registrasi',
        'program_studi',
        'jalur_pendaftaran',
        'status',
        'formulir',
        'pembayaran',
        'verified'
    ];

    protected $casts = [
        'formulir' => 'boolean',
        'pembayaran' => 'boolean',
        'verified' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
