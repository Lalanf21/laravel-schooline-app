<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nama'=> 'admin',
            'nisn'=>'123123123',
            'password' => bcrypt('admin')
        ]);
        
        $user->assignRole('admin');

    }
}
