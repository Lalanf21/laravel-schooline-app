<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $fillable = ['nisn','nama','tgl_lahir','kelas','tahun_ajaran','password','is_active','foto'];

    protected $table = 'siswa';
}
