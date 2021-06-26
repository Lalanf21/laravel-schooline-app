<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AbsensiSiswaModel extends Model
{
    protected $fillable = [
        'id_absensi',
        'id_siswa',
        'file_surat',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'absensi_siswa';

    public function absensi()
    {
        return $this->belongsTo('\App\Model\AbsensiModel', 'id_absensi', 'id_absensi');
    }

    public function siswa()
    {
        return $this->belongsTo('\App\Model\SiswaModel', 'id_siswa', 'id_siswa');
    }
}
