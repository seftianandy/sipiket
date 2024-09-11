<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $table = 'jadwal_pelajaran';

    protected $fillable = [
        'hari_id',
        'ruang_id',
        'jam_pelajaran_id',
        'mata_pelajaran_id',
        'rombongan_belajar_id',
        'semester_id'
    ];

    public $timestamps = true;

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'hari_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(RuangKelas::class, 'ruang_id');
    }

    public function jam_pelajaran()
    {
        return $this->belongsTo(JamPelajaran::class, 'jam_pelajaran_id');
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function rombongan_belajar()
    {
        return $this->belongsTo(RombonganBelajar::class, 'rombongan_belajar_id');
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'semester_id');
    }

    public function guru()
    {
        return $this->hasOneThrough(Guru::class, MataPelajaran::class, 'id', 'id', 'mata_pelajaran_id', 'guru_id');
    }

    public static function getJadwalWithRelations($tahunAjaranId)
    {
        return self::with(['hari', 'ruangan', 'jam_pelajaran', 'mata_pelajaran', 'guru', 'rombongan_belajar', 'tahun_ajaran'])
            ->where('semester_id', $tahunAjaranId)
            ->get();
    }
}
