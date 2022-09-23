<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;
class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'from_year' => '1',
                'to_year' => '2',
            ],
            [
                'from_year' => '2',
                'to_year' => '3',
            ],
            [
                'from_year' => '3',
                'to_year' => '5',
            ]
        ];

        Experience::insert($data);
    }
}
