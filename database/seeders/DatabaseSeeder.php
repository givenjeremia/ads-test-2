<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\KendaraanSeeder;
use Database\Seeders\PenyewaanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(KendaraanSeeder::class);
        $this->call(PenyewaanSeeder::class);
        $this->call(UsersSeeder::class);


        

    }
}
