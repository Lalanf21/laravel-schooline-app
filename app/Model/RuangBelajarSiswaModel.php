<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RuangBelajarSiswaModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'id_siswa',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ruang_belajar_siswa';

    public function siswa()
    {
        return $this->belongsTo('\App\Model\SiswaModel','id_siswa','id_siswa');
    }

    public function ruang_belajar()
    {
        return $this->belongsTo('\App\Model\RuangBelajarModel','id_ruang_belajar','id_ruang_belajar');
    }
}
