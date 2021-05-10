<?php

use App\Model\guruModel;
use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        guruModel::create([
            'nama' => 'khodijah',
            'nip' => '878652421',
            'tgl_lahir' => '1978-09-21',
            'no_hp' => '08986283749',
            'is_active' => '1',
            'foto' => 'img.jpg',
        ]);

        guruModel::create([
            'nama' => 'Sarimin',
            'nip' => '8786524211',
            'tgl_lahir' => '1968-09-22',
            'no_hp' => '08136283749',
            'is_active' => '1',
            'foto' => 'img.jpg',
        ]);

        guruModel::create([
            'nama' => 'Haririe',
            'nip' => '8786524215',
            'tgl_lahir' => '1998-01-02',
            'no_hp' => '0886283749',
            'is_active' => '1',
            'foto' => 'img.jpg',
        ]);
    }
}
