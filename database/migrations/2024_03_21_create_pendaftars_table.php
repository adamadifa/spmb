<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_registrasi')->unique();
            $table->string('program_studi')->nullable();
            $table->string('jalur_pendaftaran')->nullable();
            $table->string('status')->default('belum_mulai');
            $table->boolean('formulir')->default(false);
            $table->boolean('pembayaran')->default(false);
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
};
