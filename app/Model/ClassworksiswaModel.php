<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassworksiswaModel extends Model
{
    protected $fillable = [
        'id_classwork',
        'id_siswa',
        'tanggal',
        'file',
        'nilai',
        'created_at',
        'updated_at',
    ];

    protected $table = 'classwork_siswa';

    public function siswa()
    {
        return $this->belongsTo('\App\Model\SiswaModel', 'id_siswa', 'id_siswa');
    }

    public function classwork()
    {
        return $this->belongsTo('\App\Model\ClassworkModel', 'id_classwork', 'id_classwork');
    }
}
