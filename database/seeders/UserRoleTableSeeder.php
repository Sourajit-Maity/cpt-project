<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UserTypes=['SUPER-ADMIN','CLIENT'];
        foreach ($UserTypes as $key => $UserType) {
            Role::create(['name' => $UserType]);
        }

    }
}
