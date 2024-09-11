<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peserta_didik', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('nis');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('nama_ayah');
            $table->string('no_hp_ayah');
            $table->string('nama_ibu');
            $table->string('no_hp_ibu');
            $table->string('nama_wali');
            $table->string('no_hp_wali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didik');
    }
};
