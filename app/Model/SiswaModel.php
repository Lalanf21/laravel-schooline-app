<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $fillable = ['nisn','nama','tgl_lahir','kelas','tahun_ajaran','jurusan','is_active','foto'];

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

}
