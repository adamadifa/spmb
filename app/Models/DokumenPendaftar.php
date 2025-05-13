<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_online_dokumen';

    protected $fillable = [
        'pendaftar_id',
        'jenis_dokumen_id',
        'file_path',
        'status'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id', 'kode_dokumen');
    }
}
