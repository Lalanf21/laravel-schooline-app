<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class jurusanModel extends Model
{
    protected $fillable = [
        'nama_jurusan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';

    public function siswa()
    {
        return $this->hasOne('App\Model\siswaModel', 'id_kelas');
    }
}
