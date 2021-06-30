<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RuangBelajarModel extends Model
{
    protected $fillable = [
        'id_mapel',
        'id_guru',
        'nama',
        'kode',
        'jumlah_pertemuan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ruang_belajar';
    protected $primaryKey = 'id_ruang_belajar';

    public function siswa()
    {
        return $this->belongsToMany('\App\Model\SiswaModel', 'ruang_belajar', 'id_siswa','id_siswa');
    }

    public function mapel()
    {
        return $this->belongsTo('\App\Model\MapelModel','id_mapel','id_mapel');
    }

    public function guru()
    {
        return $this->belongsTo('\App\Model\GuruModel','id_guru','id_guru');
    }

}
