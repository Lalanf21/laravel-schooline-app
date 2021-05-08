<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class jurusanModel extends Model
{
    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
    ];

    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
}
