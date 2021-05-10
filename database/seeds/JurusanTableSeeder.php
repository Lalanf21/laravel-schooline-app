<?php

use App\Model\jurusanModel;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jurusanModel::create(
            ['nama_jurusan' => 'TKJ']
        );
        
        jurusanModel::create(
            ['nama_jurusan' => 'OTKP']
        );

        jurusanModel::create(
            ['nama_jurusan' => 'TBSM']
        );
    }
}
