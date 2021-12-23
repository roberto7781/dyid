<?php

namespace Database\Seeders;

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
        // Calling the other seeder
        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
