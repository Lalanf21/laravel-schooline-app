<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapelModel extends Model
{
    protected $fillable = [
        'nama_mapel',
        'id_kelas',
        'id_guru',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';

    // relation
    public function kelas()
    {
        return $this->belongsTo('\App\Model\KelasModel','id_kelas');
    }

    public function guru()
    {
        return $this->belongsToMany('\App\Model\GuruModel','id_mapel');
    }
}
