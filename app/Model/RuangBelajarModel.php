<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RuangBelajarModel extends Model
{
    protected $fillable = [
        'id_mapel',
        'id_kelas',
        'id_guru',
        'id_siswa',
        'nama',
        'kode',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ruang_belajar';
    protected $primaryKey = 'id_ruang_belajar';
}
