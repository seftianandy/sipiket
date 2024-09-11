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
        Schema::create('rombongan_belajar', function (Blueprint $table) {
            $table->id();
            $table->string('semester_id');
            $table->string('jurusan_id');
            $table->string('nama');
            $table->string('guru_id');
            $table->string('tingkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombongan_belajar');
    }
};
