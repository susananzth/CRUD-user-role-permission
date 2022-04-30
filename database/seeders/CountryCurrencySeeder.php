<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Country::all();
        for ($i=1; $i <= count($countries); $i++) {
            Country::findOrFail($i)->currencies()->sync($i);
        }
    }
}
