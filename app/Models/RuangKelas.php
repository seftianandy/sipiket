<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
        'nama',
        'description',
    ];

    public $timestamps = true;
}
