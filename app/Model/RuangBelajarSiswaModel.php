<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RuangBelajarSiswaModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'id_siswa',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ruang_belajar_siswa';
}
