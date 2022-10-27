<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $settings['social_media'] = json_decode($settings['social_media']);
        return view('panel/settings', ['settings' => ($settings)]);
    }
    public function login()
    {
        return view('panel/login');
    }
}