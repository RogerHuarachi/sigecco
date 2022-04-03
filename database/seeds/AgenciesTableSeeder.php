<?php

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::create([
            'name'       => 'AGENCIA NACIONAL',
            'codigo'       => 'CN',
            'city_id'      => '4',
            'autonomy'      => 0
        ]);
        Agency::create([
            'name'       => 'AGENCIA CALA CALA',
            'codigo'       => 'C00',
            'city_id'      => '4',
            'autonomy'      => 6000
        ]);
        Agency::create([
            'name'       => 'AGENCIA EL PASO',
            'codigo'       => 'C01',
            'city_id'      => '4',
            'autonomy'      => 6000
        ]);
        Agency::create([
            'name'       => 'AGENCIA PUNATA',
            'codigo'       => 'C02',
            'city_id'      => '4',
            'autonomy'      => 6000
        ]);
        Agency::create([
            'name'       => 'AGENCIA CASCO VIEJO',
            'codigo'       => 'G00',
            'city_id'      => '9',
            'autonomy'      => 0
        ]);
        Agency::create([
            'name'       => 'AGENCIA RIO SECO',
            'codigo'       => 'B00',
            'city_id'      => '1',
            'autonomy'      => 6000
        ]);
    }
}
