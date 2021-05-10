<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class mapelModel extends Model
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
        return $this->belongsTo('\App\Model\kelasModel','id_kelas');
    }

    public function guru()
    {
        return $this->belongsTo('\App\Model\guruModel','id_mapel');
    }
}
