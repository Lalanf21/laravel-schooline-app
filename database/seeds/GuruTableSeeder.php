<?php

use App\Model\GuruModel;
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
            'foto' => 'foto/user.jpg',
        ]);

        guruModel::create([
            'nama' => 'Sarimin',
            'nip' => '8786524211',
            'tgl_lahir' => '1968-09-22',
            'no_hp' => '08136283749',
            'is_active' => '1',
            'foto' => 'foto/user.jpg',
        ]);

        guruModel::create([
            'nama' => 'Haririe',
            'nip' => '8786524215',
            'tgl_lahir' => '1998-01-02',
            'no_hp' => '0886283749',
            'is_active' => '1',
            'foto' => 'foto/user.jpg',
        ]);

        guruModel::create([
            'nama' => 'admin',
            'nip' => '123123123',
            'tgl_lahir' => '1998-01-03',
            'no_hp' => '08123432123',
            'is_active' => '1',
            'foto' => 'foto/user.jpg',
        ]);
    }
}
