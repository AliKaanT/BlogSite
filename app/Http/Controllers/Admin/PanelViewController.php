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
        return view('panel/index');
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