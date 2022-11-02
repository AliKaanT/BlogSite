<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PanelViewController extends Controller
{
    public function index()
    {
        return view('panel/index');
    }

    public function settings()
    {
        $settings = SiteSettings::first();
        return view('panel/settings', ['settings' => ($settings)]);
    }

    public function categories()
    {
        $categories = Category::withCount(['posts'])->get()->all(['id', 'name', 'is_active']);
        return view('panel/categories', compact('categories'));
    }

    public function login()
    {
        return view('panel/login');
    }
}