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
            'username' => 'susananzth',
            'code' => '+51',
            'phone' => '982701107',
            'email' => 'admin@susananzth.com',
            'address' => 'La Playa',
            'password' => bcrypt('123456'),
            'remember_token' => null,
        ]);
        User::create([
            'firstname' => 'User',
            'lastname' => 'Customer',
            'username' => 'user',
            'code' => '+51',
            'phone' => '999666333',
            'email' => 'user@mail.com',
            'address' => 'Barquisimeto',
            'password' => bcrypt('123456'),
            'remember_token' => null,
        ]);
    }
}
