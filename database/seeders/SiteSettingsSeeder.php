<?php

namespace Database\Seeders;

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;

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
            'favicon_path' => 'admin/site/img/favicon.ico',
            'logo_path' => 'admin/site/img/logo.png',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adip, sed diam euismod sed diam ea rebum. Ut enim ad minim veniam',
            'meta_tags' => ([
                '<meta charset="UTF-8">',
                '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
                '<meta http-equiv="X-UA-Compatible" content="ie=edge">',
            ]),
            'social_medias' => ([
                'twitter' => 'https://twitter.com/LaravelTr',
                'instagram' => 'https://www.instagram.com/bimturkiye/',
                'youtube' => 'https://www.youtube.com/shorts/GPhbe-__RLM',
                'github' => 'https://github.com/AliKaanT',
            ]),
        ]);
    }
}
