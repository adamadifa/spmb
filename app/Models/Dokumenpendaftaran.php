<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumenpendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_online_dokumen';
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'no_register';
}
