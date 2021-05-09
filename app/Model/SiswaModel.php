<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $fillable = [
        'id_jurusan',
        'id_kelas',
        'nama',
        'nisn',
        'tgl_lahir',
        'kelas',
        'is_active',
        'tahun_ajaran',
        'foto',
        'created_at',
        'updated_at',
    ];

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

}
