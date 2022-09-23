<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        // $this->call(CmsSeeder::class);
        // $this->call(LanguageSeeder::class);
        // $this->call(ExperienceSeeder::class);
        // $this->call(SkillSeeder::class);
        // $this->call(SecurityQuestionSeeder::class);
        // $this->call(NurseTypeSeeder::class);
        // $this->call(ShiftTimeSeeder::class);
        
       
        // \App\Models\User::factory(10)->create();
    }
}
