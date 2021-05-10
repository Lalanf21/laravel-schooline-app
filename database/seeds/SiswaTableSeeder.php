<?php

use App\Model\SiswaModel;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiswaModel::create([
            'id_jurusan' => '1',
            'id_kelas' => '1',
            'nisn'=>'987654321',
            'nama'=>'Anisa S',
            'tgl_lahir'=>'1999-08-21',
            'tahun_ajaran'=>'2020/2021',
            'is_active'=>'1',
            'foto'=>'img.jpg'
        ]);
        SiswaModel::create([
            'id_jurusan' => '2',
            'id_kelas' => '2',
            'nisn'=>'32165478',
            'nama'=>'nisa B',
            'tgl_lahir'=>'1999-08-22',
            'tahun_ajaran'=>'2020/2021',
            'is_active'=>'1',
            'foto'=>'img.jpg'
        ]);
    }
}
