<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RuangBelajarModel extends Model
{
    protected $fillable = [
        'id_mapel',
        'nama',
        'kode',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ruang_belajar';
    protected $primaryKey = 'id_ruang_belajar';

    public function siswa()
    {
        return $this->belongsToMany('\App\Model\SiswaModel', 'ruang_belajar_siswa', 'id_ruang_belajar','id_siswa');
    }

    public function mapel()
    {
        return $this->belongsTo('\App\Model\MapelModel','id_mapel');
    }

    public function guru()
    {
        return $this->belongsTo('\App\Model\GuruModel', 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo('\App\Model\KelasModel', 'id_kelas');
    }
}
