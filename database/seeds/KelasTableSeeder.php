<?php

use App\Model\kelasModel;
use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kelasModel::create([
            'nama_kelas'=>'10'
        ]);
        kelasModel::create([
            'nama_kelas'=>'11'
        ]);
        kelasModel::create([
            'nama_kelas'=>'12'
        ]);
    }
}
