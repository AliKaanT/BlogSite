<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class PanelViewController extends Controller
{
    public function index()
    {
        $meta = SiteSettings::select('meta_tags')->first();
        $metatag =  json_decode($meta->meta_tags);
        return view('panel/index',compact('metatag'));
    }

    public function settings()
    {
        $settings = SiteSettings::find(1)->all()->first();
        $settings['meta_tags'] = json_decode($settings['meta_tags']);
        $settings['social_medias'] = json_decode($settings['social_medias']);
        return view('panel/settings', ['settings' => ($settings)]);
    }
    public function login()
    {
        return view('panel/login');
    }
}