<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->text('deskripsi')->nullable();
            $table->boolean('wajib')->default(true);
            $table->timestamps();
        });

        // Insert default jenis dokumen
        DB::table('jenis_dokumen')->insert([
            [
                'nama_dokumen' => 'Kartu Keluarga',
                'deskripsi' => 'Scan/foto Kartu Keluarga',
                'wajib' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_dokumen' => 'Akta Kelahiran',
                'deskripsi' => 'Scan/foto Akta Kelahiran',
                'wajib' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_dokumen' => 'Ijazah/SKL',
                'deskripsi' => 'Scan/foto Ijazah atau Surat Keterangan Lulus',
                'wajib' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_dokumen' => 'SKHUN',
                'deskripsi' => 'Scan/foto Surat Keterangan Hasil Ujian Nasional',
                'wajib' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_dokumen' => 'Pas Foto',
                'deskripsi' => 'Pas Foto 3x4 dengan latar belakang merah',
                'wajib' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('jenis_dokumen');
    }
};
