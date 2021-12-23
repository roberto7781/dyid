<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert Admin User
        User::create([
            'userName' => 'Admin',
            'userAddress' => '-',
            'userGender' => 'Male',
            'userPassword' => Hash::make('admin12345'),
            'userEmail' => 'admin12345@gmail.com',
            'roleID' => 1,
        ]);
    }
}
