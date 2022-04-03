<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'       => 'LA PAZ',
        ]);
        City::create([
            'name'       => 'ORURO',
        ]);
        City::create([
            'name'       => 'POTOSI',
        ]);
        City::create([
            'name'       => 'COCHABAMBA',
        ]);
        City::create([
            'name'       => 'CHUQUISACA',
        ]);
        City::create([
            'name'       => 'TARIJA',
        ]);
        City::create([
            'name'       => 'PANDO',
        ]);
        City::create([
            'name'       => 'BENI',
        ]);
        City::create([
            'name'       => 'SANTA CRUZ',
        ]);
    }
}
