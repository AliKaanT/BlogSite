<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelViewController extends Controller
{
    public function login()
    {
        return view('panel.views.others.login');
    }
    public function index()
    {
        return view('panel.views.others.main');
    }

    public function settings()
    {
        $settings = SiteSettings::first();
        return view('panel.views.others.settings', ['settings' => ($settings)]);
    }

    public function profile(Request $request)
    {
        $user = Auth::guard('admin')->user();
        return view('panel.views.others.profile', compact('user'));
    }

    /**CATEGORIES**/

    public function categories()
    {
        $categories = Category::withCount(['posts'])->get()->all(['id', 'name', 'is_active']);
        return view('panel.views.categories.index', compact('categories'));
    }

    public function edit_category(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return view('panel.views.categories.edit', compact('category'));
    }

    /**POSTS**/

    public function posts(Request $request)
    {
        $posts = Post::all();
        // return $posts;
        return view('panel.views.posts.index', compact('posts'));
    }

    public function edit_post(Request $request, $id)
    {
        $post = Post::with('categories:name,id')->findOrFail($id);
        $categories = Category::all();
        return view('panel.views.posts.edit', compact('post', 'categories'));
    }

    public function create_post(Request $request)
    {
        $categories = Category::all();
        return view('panel.views.posts.create', compact('categories'));
    }

    /**PAGES**/

    public function pages(Request $request)
    {
        $pages = Page::all();
        return view('panel.views.pages.index', compact('pages'));
    }

    public function create_page(Request $request)
    {
        return view('panel.views.pages.create');
    }

    public function edit_page(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        return view('panel.views.pages.edit', compact('page'));
    }

}
