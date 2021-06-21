<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassworksiswaModel extends Model
{
    protected $fillable = [
        'id_classwork',
        'id_siswa',
        'file',
        'nilai',
        'created_at',
        'updated_at',
    ];

    protected $table = 'classwork_siswa';
}
