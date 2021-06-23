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
            'nama_mapel' => 'Ipa',
            'id_kelas' => '1',
            'is_active' => '1',
        ]);
        mapelModel::create([
            'nama_mapel' => 'B.indonesia',
            'id_kelas' => '2',
            'is_active' => '1',
        ]);
        mapelModel::create([
            'nama_mapel' => 'IPS',
            'id_kelas' => '3',
            'is_active' => '3',
        ]);
    }
}
