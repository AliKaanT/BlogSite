<?php

namespace Database\Seeders;

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSettings::create([
            'title' => 'Blog Sitesi',
            'favicon_path' => 'favicon.ico',
            'logo_img_path' => 'logo.png',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adip, sed diam euismod sed diam ea rebum. Ut enim ad minim veniam',
            // 'meta_tags' => json_encode([
            //     ['name' => 'viewport', 'content' => "width=device-width, initial-scale=1.0"],
            //     ['http-equiv' => "X-UA-Compatible", 'content' => "ie=edge"],
            //     ['charset' => "UTF-8"],
            // ]),
            'meta_tags' => json_encode([
                '<meta charset="UTF-8">',
                '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
                '<meta http-equiv="X-UA-Compatible" content="ie=edge">',
            ]),
            'social_media' => json_encode([
                'facebook' => 'https://www.facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://www.linkedin.com',
            ]),
        ]);
    }
}