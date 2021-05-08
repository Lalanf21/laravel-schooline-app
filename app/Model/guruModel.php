<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class guruModel extends Model
{
    protected $fillable = [
        'id_mapel',
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
}
