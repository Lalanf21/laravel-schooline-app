<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class mapelModel extends Model
{
    protected $fillable = [
        'nama_mapel',
        'id_kelas',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';
}
