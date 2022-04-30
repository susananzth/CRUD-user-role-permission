<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'username' => 'superuser',
            'phone_code_id' => null,
            'phone' => null,
            'email' => 'me@susananzth.com',
            'city_id' => 2,
            'address' => 'Barquisimeto',
            'password' => bcrypt('123456'),
            'remember_token' => null,
        ]);
        User::create([
            'firstname' => 'User A',
            'lastname' => 'Pérez',
            'username' => 'user',
            'phone_code_id' => 1,
            'phone' => '999666333',
            'email' => 'user@mail.com',
            'city_id' => 2,
            'address' => 'Barquisimeto',
            'password' => bcrypt('123456'),
            'remember_token' => null,
        ]);
    }
}
