<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Languages;
class LanguageSeeder extends Seeder
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
                'language_name' => 'English',
            ],
            [
                'language_name' => 'German',
            ],
            [
                'language_name' => 'Spanish',
            ]
        ];

        Languages::insert($data);
    
    }
}
