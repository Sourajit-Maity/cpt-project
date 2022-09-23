<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShiftTime;
class ShiftTimeSeeder extends Seeder
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
                'shift_name' => 'Morning',
                'shift_time' => 8,
            ],
            [
                'shift_name' => 'Day',
                'shift_time' => 8,
            ],
            [
                'shift_name' => 'Night',
                'shift_time' => 8,
            ]
        ];

        ShiftTime::insert($data);
    }
}
