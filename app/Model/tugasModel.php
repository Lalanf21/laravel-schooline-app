<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TugasModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'judul',
        'deadline',
        'file',
        'tgl_publish',
        'is_publish',
        'created_at',
        'updated_at',
    ];

    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';
}
