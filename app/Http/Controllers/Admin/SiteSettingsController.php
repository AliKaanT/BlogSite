<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingsController extends Controller
{
    public function update(Request $request)
    {

        /*Request Example
         
         "title": "Blog Sitesi",
         
         "favicon_path": "favicon.ico",
         
         "logo_img_path": "logo.png",
         
         "description": "Lorem ipsum dolor sit amet, consectetur adip, sed diam euismod sed diam ea rebum. Ut enim ad minim veniam",
         
         "meta_tag_0": "<meta charset=\"UTF-8\">",
         "meta_tag_1": "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">",
         
         "social_media_key_7": "linkedin",
         "social_media_value_7": "https://www.linkedin.com",
         "social_media_key_8": "instagram",
         "social_media_value_8": "https://instagram.com"
         
         */

        $meta_tags = array();
        $social_medias = array();

        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'meta_tag')) {
                $meta_tags[] = $value;
            } else if (str_contains($key, 'social_media_key')) {
                $num = explode('_', $key)[3];
                $social_medias[$value] = $request["social_media_value_$num"];
            }
        }

        SiteSettings::find(1)->update([
            'title' => $request['title'],
            'favicon_path' => $request['favicon_path'],
            'logo_img_path' => $request['logo_img_path'],
            'description' => $request['description'],
            'meta_tags' => json_encode($meta_tags),
            'social_medias' => json_encode($social_medias),
        ]);

        return redirect()->back();
    }
}