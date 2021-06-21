<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(GuruTableSeeder::class);
        // $this->call(MapelTableSeeder::class);
    }
}
