<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
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
        return $this->hasOne('App\Model\MapelModel','id_mapel');
    }

    public function siswa()
    {
        return $this->hasOne('App\Model\SiswaModel','id_kelas');
    }

}
