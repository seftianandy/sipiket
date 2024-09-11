<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    protected $table = 'peserta_didik';

    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_hp',
        'nama_ayah',
        'no_hp_ayah',
        'nama_ibu',
        'no_hp_ibu',
        'nama_wali',
        'no_hp_wali'
    ];

    public $timestamps = true;
}
