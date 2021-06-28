<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'id_siswa',
        'tanggal_absen',
        'file',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';

    public function ruang_belajar()
    {
        return $this->belongsTo('\App\Model\RuangBelajarModel', 'id_ruang_belajar', 'id_ruang_belajar');
    }

    public function siswa()
    {
        return $this->belongsTo('\App\Model\SiswaModel', 'id_siswa', 'id_siswa');
    }
}
