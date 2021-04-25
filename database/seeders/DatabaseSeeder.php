<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'admin@susananzth.com',
            'password' => bcrypt('123456'),
        ]);
        \App\Models\User::factory(10)->create();
    }
}
