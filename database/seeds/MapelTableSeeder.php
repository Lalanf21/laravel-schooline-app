<?php

use App\Model\MapelModel;
use Illuminate\Database\Seeder;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mapelModel::create([
            'id_guru' => '1',
            'id_kelas' => '1',
            'is_active' => '1',
            'nama_mapel' => 'Ipa'
        ]);
        mapelModel::create([
            'id_guru' => '2',
            'id_kelas' => '2',
            'is_active' => '1',
            'nama_mapel' => 'B.indonesia'
        ]);
        mapelModel::create([
            'id_guru' => '3',
            'id_kelas' => '3',
            'is_active' => '3',
            'nama_mapel' => 'IPS'
        ]);
    }
}
