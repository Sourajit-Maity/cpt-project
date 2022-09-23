<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cms;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'title' => 'Copyright Policy',
                'slug' => 'copyright-policy',
                'text_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
            ],
            [
                'title' => 'Terms of Use',
                'slug' => 'terms-of-use',
                'text_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'text_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
            ],
          
        ];
        foreach ($datas as $data) {
            Cms::create($data);
        }
    }
}
