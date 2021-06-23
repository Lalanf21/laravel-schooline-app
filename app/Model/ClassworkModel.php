<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassworkModel extends Model
{
    protected $fillable = [
        'id_ruang_belajar',
        'jenis',
        'judul',
        'deskripsi',
        'deadline',
        'file',
        'tanggal',
        'is_publish',
        'created_at',
        'updated_at',
    ];

    protected $table = 'classwork';
    protected $primaryKey = 'id_classwork';

    public function ruang_belajar()
    {
        return $this->belongsTo('\App\Model\RuangBelajarModel', 'id_ruang_belajar', 'id_ruang_belajar');
    }

    public function classwork()
    {
        return $this->hasOne('\App\Model\ClassworksiswaModel', 'id_classwork', 'id_classwork');
    }
    
}
