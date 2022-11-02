<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SiteViewController extends Controller
{

    public function index(Request $request)
    {
        $hl_posts = Post::where('highlight', "1")->with('categories:name')->orderBy('posted_at', 'DESC')->get();

        foreach ($hl_posts as $key => $value) { // Kategorileri bir array haline çeviriyoruz
            $tmp = [];
            foreach ($value['categories'] as $v) {
                $tmp[] = $v['name'];
            };
            unset($hl_posts[$key]['categories']); // Overwrite yapmama izin vermiyor ?????
            $hl_posts[$key]['categories'] = $tmp;
        }

        $recent_posts = Post::orderBy('posted_at', 'DESC')->get()->take(3);
        $categories = Category::where('is_active','1')->get(['id', 'name']);
        // return $categories;
        return view('site/index', compact('hl_posts', 'recent_posts', 'categories'));
    }

}
