<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'id'    => 1,
                'name' => 'Boliviano',
                'code' => 'BOB',
                'symbol' => 'Bs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 2,
                'name' => 'Peso Colombiano',
                'code' => 'COP',
                'symbol' => '$',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 3,
                'name' => 'Peso Mexicano',
                'code' => 'MXN',
                'symbol' => '$',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 4,
                'name' => 'Sol',
                'code' => 'PEN',
                'symbol' => 'S/.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 5,
                'name' => 'Dollar',
                'code' => 'USD',
                'symbol' => '$',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Currency::insert($currencies);
    }
}
