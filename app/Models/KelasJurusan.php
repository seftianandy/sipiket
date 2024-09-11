<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasJurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'nama',
        'description',
    ];

    public $timestamps = true;
}
