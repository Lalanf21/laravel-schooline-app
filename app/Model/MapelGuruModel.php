<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapelGuruModel extends Model
{
    protected $fillable = [
        'id_mapel',
        'id_guru',
        'created_at',
        'updated_at',
    ];

    protected $table = 'mapel_guru';

    public function guru()
    {
        return $this->belongsTo('\App\Model\GuruModel', 'id_guru', 'id_guru');
    }

    public function mapel()
    {
        return $this->belongsTo('\App\Model\MapelModel', 'id_mapel', 'id_mapel');
    }


}
