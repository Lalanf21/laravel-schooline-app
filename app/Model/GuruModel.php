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
    public function mapel()
    {
        return $this->hasMany('\App\Model\MapelModel','id_guru');
    }
}


