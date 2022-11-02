<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File as FileValidator;

class SiteSettingsController extends Controller
{
    public function update(Request $request)
    {

        /*Request Example
         
         "title": "Blog Sitesi",
         
         "favicon_path": "favicon.ico",
         
         "logo_path": "logo.png",
         
         "description": "Lorem ipsum dolor sit amet, consectetur adip, sed diam euismod sed diam ea rebum. Ut enim ad minim veniam",
         
         "meta_tag_0": "<meta charset=\"UTF-8\">",
         "meta_tag_1": "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">",
         
         "social_media_key_7": "linkedin",
         "social_media_value_7": "https://www.linkedin.com",
         "social_media_key_8": "instagram",
         "social_media_value_8": "https://instagram.com"
         
         */
        
        $validation = Validator::make($request->all(), [
            'logo' => ['required', FileValidator::types(['png', 'jpg', 'jpeg'])],
            'favicon' => ['required', FileValidator::types(['ico'])],
        ]);
        
        $newSettings = SiteSettings::find(1);
        
        if ($request['logo']) {
            $randomName = (Str::random(16) . "." . $request['logo']->extension());
            $logo_path = ('admin/site/img/' . $randomName);
            File::move($request['logo']->getPathName(), public_path($logo_path));
            // $logo_path = $request->file('logo')->storeAs('public/uploads', $randomName);
            $newSettings['logo_path'] = $logo_path;

        }
        if ($request['favicon']) {
            $randomName = (Str::random(16) . "." . $request['favicon']->extension());
            $favicon_path = ('admin/site/img/' . $randomName);
            File::move($request['favicon']->getPathName(), public_path($favicon_path));
            // $favicon_path = $request->file('favicon')->storeAs('public/uploads', $randomName);
            $newSettings['favicon_path'] = $favicon_path;
        }

        /************************************************ */
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


        $newSettings['title'] = $request['title'];
        $newSettings['description'] = $request['description'];
        $newSettings['meta_tags'] = $meta_tags;
        $newSettings['social_medias'] = $social_medias;

        $newSettings->save();

        return redirect()->back();
    }
}