<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class materiModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'judul',
        'konten',
        'file',
        'tgl',
        'is_publish',
        'created_at',
        'updated_at',
    ];

    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
}
