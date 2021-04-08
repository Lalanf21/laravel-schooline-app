<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    protected $fillable = ['nip', 'nama', 'no_hp', 'nama_mapel', 'is_active'];

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

}
