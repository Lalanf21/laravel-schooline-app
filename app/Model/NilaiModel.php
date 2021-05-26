<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NilaiModel extends Model
{
    protected $fillable = [
        'id_tugas',
        'nilai_tugas',
        'created_at',
        'updated_at',
    ];

    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
}
