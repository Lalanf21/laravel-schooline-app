<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class absensiModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'id_siswa',
        'tgl_absen',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
}
