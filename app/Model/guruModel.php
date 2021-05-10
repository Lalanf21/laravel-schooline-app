<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class guruModel extends Model
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
    public function mapel()
    {
        return $this->hasMany('\App\Model\mapelModel','id_guru');
    }
}


