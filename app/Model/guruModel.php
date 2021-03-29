<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class guruModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['nip', 'nama', 'no_hp', 'nama_mapel','password', 'is_active'];

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

}
