<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'id' => 1,
                'state_id' => '1',
                'city_name' => 'Alabama City',
            ],
            [
                'id' => 2,
                'state_id' => '1',
                'city_name' => 'Alaska',
            ],
            [
                'id' => 3,
                'state_id' => '1',
                'city_name' => 'Arkansas',
            ]
        ];

        City::insert($cities);
    }
}
