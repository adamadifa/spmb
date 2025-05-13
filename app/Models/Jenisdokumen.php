<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisdokumen extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_jenis_dokumen';
    protected $guarded = [];
    protected $primaryKey = 'kode_dokumen';
    public $incrementing = false;
}
