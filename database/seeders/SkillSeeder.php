<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skills;
class SkillSeeder extends Seeder
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
                'skill_name' => 'CNA',
            ],
            [
                'skill_name' => 'LPN',
            ],
        ];

        Skills::insert($data);
    
    }
}
