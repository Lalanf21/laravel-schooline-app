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
        return $this->belongsToMany('\App\Model\SiswaModel');
    }

    public function mapel()
    {
        return $this->belongsTo('\App\Model\MapelModel','id_mapel');
    }

}
