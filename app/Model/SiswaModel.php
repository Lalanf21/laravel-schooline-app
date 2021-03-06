<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiswaModel extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'id_jurusan',
        'id_kelas',
        'nama',
        'nisn',
        'tgl_lahir',
        'is_active',
        'tahun_ajaran',
        'foto',
        'created_at',
        'updated_at',
    ];

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    // relation
    public function kelas()
    {
        return $this->belongsTo('\App\Model\KelasModel', 'id_kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo('\App\Model\JurusanModel', 'id_jurusan');
    }

    public function ruang_belajar()
    {
        return $this->belongsToMany('\App\Model\RuangBelajarModel','ruang_belajar_siswa','id_siswa','id_ruang_belajar');
    }

    public function classwork()
    {
        return $this->belongsToMany('\App\Model\ClassworkModel','classwork_siswa','id_siswa','id_classwork');
    }

    // public function ruang_belajar_siswa()
    // {
    //     return $this->hasMany('\App\Model\RuangBelajarSiswaModel','id_siswa','id_siswa');
    // }
}
