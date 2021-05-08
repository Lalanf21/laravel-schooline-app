<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kelasModel extends Model
{
    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
    ];

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
}
