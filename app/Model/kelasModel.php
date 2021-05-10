<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kelasModel extends Model
{
    protected $fillable = [
        'nama_kelas',
        'created_at',
        'updated_at',
    ];

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';

    // relation
    public function mapel()
    {
        return $this->hasOne('App\Model\mapelModel','id_mapel');
    }

    public function siswa()
    {
        return $this->hasOne('App\Model\siswaModel','id_kelas');
    }

}
