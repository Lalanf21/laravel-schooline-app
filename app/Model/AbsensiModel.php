<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'id_siswa',
        'file_surat',
        'tanggal_absen',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
}
