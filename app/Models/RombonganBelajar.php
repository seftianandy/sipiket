<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RombonganBelajar extends Model
{
    protected $table = 'rombongan_belajar';

    protected $fillable = [
        'semester_id',
        'jurusan_id',
        'nama',
        'guru_id',
        'tingkat',
    ];

    public $timestamps = true;

    public function semester()
    {
        return $this->belongsTo(TahunAjaran::class, 'semester_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(KelasJurusan::class, 'jurusan_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public static function getRombonganBelajar($tahunAjaranId)
    {
        return self::with('semester', 'jurusan', 'guru')
                    ->where('semester_id', $tahunAjaranId)
                    ->get();
    }

    public static function getRombonganBelajarById($tahunAjaranId, $rombelId)
    {
        return self::with('semester', 'jurusan', 'guru')
                    ->where('semester_id', $tahunAjaranId)
                    ->where('id', $rombelId)
                    ->get();
    }
}
