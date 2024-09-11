<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    
    protected $fillable = [
        'guru_id',
        'sekolah_id',
        'nama',
        'nip',
        'jenis_kelamin',
        'jenis_ptk_id',
        'status_kepegawaian_id',
        'jabatan_ptk_id',
    ];

    public $timestamps = true;
}
