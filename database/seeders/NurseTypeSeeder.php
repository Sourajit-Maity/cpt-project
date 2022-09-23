<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NurseType;
class NurseTypeSeeder extends Seeder
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
                'type_name' => 'CAN',
            ],
            [
                'type_name' => 'LPN',
            ],
            [
                'type_name' => 'RN',
            ]
        ];

        NurseType::insert($data);
    
    }
}
