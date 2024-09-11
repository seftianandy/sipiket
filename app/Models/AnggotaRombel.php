<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaRombel extends Model
{
    protected $table = 'anggota_rombel';

    protected $fillable = [
        'semester_id',
        'rombongan_belajar_id',
        'peserta_didik_id',
    ];

    public $timestamps = true;

    // Definisi relasi dengan model lain
    public function semester()
    {
        return $this->belongsTo(TahunAjaran::class, 'semester_id');
    }

    public function rombongan_belajar()
    {
        return $this->belongsTo(RombonganBelajar::class, 'rombongan_belajar_id');
    }

    public function peserta_didik()
    {
        return $this->belongsTo(PesertaDidik::class, 'peserta_didik_id');
    }

    public static function getAnggotaRombel($tahunAjaranId, $rombelId)
    {
        return self::with('semester', 'rombongan_belajar', 'peserta_didik')
                    ->where('semester_id', $tahunAjaranId)
                    ->where('rombongan_belajar_id', $rombelId)
                    ->get();
    }
}
