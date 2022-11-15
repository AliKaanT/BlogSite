<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SiteViewController extends Controller
{

    private $defaults;
    private $settings;
    public function __construct()
    {
        $this->defaults['settings'] = SiteSettings::first();
        $this->defaults['recent_posts'] = Post::orderBy('posted_at', 'DESC')->get()->take(3);
        $this->defaults['categories'] = Category::withCount(['posts'])->where('is_active', '1')->get();
        $this->defaults['pages'] = Page::where('is_active', '1')->get(['id', 'name', 'slug']);
    }
    public function index(Request $request)
    {
        $hl_posts = Post::where(['highlight' => "1", 'is_active' => 1])->with('categories')->orderBy('posted_at', 'DESC')->get();
        return view('site/index', compact('hl_posts'))->with($this->defaults);
    }

    public function posts(Request $request)
    {
        $posts = Post::where('is_active', '1')->with('categories')->get();
        return view('site/posts', compact('posts'))->with($this->defaults);

    }
    public function single_post(Request $request, $slug)
    {
        $post = Post::where(['slug' => $slug, 'is_active' => '1'])->with('categories:name,id,slug')->firstOrFail();
        return view('site/single_post', compact('post'))->with($this->defaults);
    }

    public function categories(Request $request)
    {
        $categories = Category::withCount(['posts'])->where('is_active', '1')->get();
        return view('site/categories', compact('categories'))->with($this->defaults);
    }

    public function single_category(Request $request, $slug)
    {
        $category = Category::where(['slug' => $slug, 'is_active' => '1'])->firstOrFail();
        $posts = Category::where(['id' => $category->id, 'is_active' => '1'])->firstOrFail()->posts()->where('is_active', '1')->with('categories')->get();
        return view('site/single_category', compact('posts', 'category'))->with($this->defaults);
    }   

    public function additional_pages(Request $request, $slug)
    {
        $page = Page::where(['slug' => $slug, 'is_active' => '1'])->firstOrFail();
        return view('site/pages', compact('page'))->with($this->defaults);
    }
}