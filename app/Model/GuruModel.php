<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'tgl_lahir',
        'no_hp',
        'is_active',
        'foto',
        'created_at',
        'updated_at',
    ];

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    // relation
    public function guru_mapel()
    {
        return $this->hasMany('\App\Model\MapelGuruModel', 'id_guru', 'id_guru');
    }

    public function mapel()
    {
        return $this->belongsToMany('\App\Model\MapelModel','mapel_guru','id_guru','id_mapel');
    }
}


