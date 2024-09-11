<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'mata_pelajaran',
        'description',
        'guru_id',
    ];

    public $timestamps = true;

    // Definisi relasi dengan model 'Guru'
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // Fungsi untuk mendapatkan data mata pelajaran beserta nama guru
    public static function getMataPelajaranWithGuru()
    {
        return self::with('guru')->get();
    }
}
