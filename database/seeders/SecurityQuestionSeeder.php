<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SecurityQuestion;
class SecurityQuestionSeeder extends Seeder
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
                'security_question_name' => 'Hobby',
            ],
            [
                'security_question_name' => 'School',
            ],
            [
                'security_question_name' => 'College',
            ]
        ];

        SecurityQuestion::insert($data);
    
     
    }
}
