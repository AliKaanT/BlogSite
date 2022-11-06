<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategoryLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function activityUpdate(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'value' => 'in:1,0|required',
        ]);

        if ($validation->fails()) {
            exit();
        }

        Post::where('id', $request->id)->update(['is_active' => $request->value]);

        return redirect()->back();
    }

    public function highlightUpdate(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'value' => 'in:1,0|required',
        ]);

        if ($validation->fails()) {
            exit();
        }

        Post::where('id', $request->id)->update(['highlight' => $request->value]);

        return redirect()->back();
    }

    public function update(Request $request)
    {

        $validation = Validator::make($request->only('title', 'content', 'preview_content'), [
            'title' => 'required',
            'content' => 'required',
            'preview_content' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($validation->errors())]);
        }

        $post = Post::where('id', $request->id)->with('categories')->first();
        $images = $post->images;

        $rm_categories = [];
        $add_categories = [];

        foreach ($post->categories as $val) {
            $rm_categories[] = $val->id;
        };

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) { //file
                $randomName = (Str::random(16) . "." . $request[$key]->extension());
                $img_path = ('admin/blog/' . $request->slug . $randomName);
                File::move($request[$key]->getPathName(), public_path($img_path));
                $images[] = $img_path;
            };
            if (str_contains($key, 'remove_img')) { //remove img
                foreach ($images as $k => $image) {
                    if (str_contains($value, $image)) {
                        unset($images[$k]);
                        break;
                    }
                }
            }
            if (str_contains($key, 'category_')) { //category
                print_r($value);
                if (($key = array_search($value, $rm_categories)) !== false) {
                    unset($rm_categories[$key]);
                } else {
                    $add_categories[] = $value;
                }
            }
        }
        // return $add_categories;

        if (empty($images)) { // Dont let the admin to delete all images from post
            return redirect()->back()->withErrors(['msg' => 'No images selected']);
        }

        if (count($post->categories) - count($rm_categories) + count($add_categories) <= 0) { // Dont let the admin to delete all images from post
            return redirect()->back()->withErrors(['msg' => 'No category selected']);
        }

        foreach ($rm_categories as $category_id) {
            PostCategoryLink::where([
                'post_id' => $request->id,
                'category_id' => $category_id,
            ])->first()->delete();
        }

        foreach ($add_categories as $category_id) {
            PostCategoryLink::create([
                'post_id' => $request->id,
                'category_id' => $category_id,
            ]);
        }

        $post->images = $images;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->preview_content = $request->preview_content;
        $post->save();

        return redirect()->back();
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->only('title', 'content', 'preview_content'), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($validation->errors())]);
        }

        $slug = Str::slug($request->title);

        $images = array();
        $categories = array();

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) { //file
                $randomName = (Str::random(16) . "." . $request[$key]->extension());
                $img_path = ('admin/blog/' . $slug . '-' . $randomName);
                File::move($request[$key]->getPathName(), public_path($img_path));
                $images[] = $img_path;
            };
            if (str_contains($key, 'add_category_')) {
                $categories[] = $value;
            }
            if (str_contains($key, 'remove_category_')) {
                if (($index = array_search($value, $categories)) !== false) {
                    unset($categories[$index]);
                }
            }
        }

        if (empty($categories)) {
            return redirect()->back()->withErrors(['msg' => 'No categories selected']);
        }
        if (empty($images)) {
            return redirect()->back()->withErrors(['msg' => 'No images selected']);
        }

        $new_post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'preview_content' => $request->preview_content ?? substr($request->content, 0, 64),
            'slug' => $slug,
            'posted_at' => Carbon::now(),
            'images' => $images,
        ]);

        foreach ($categories as $category) {
            PostCategoryLink::create([
                'post_id' => $new_post->id,
                'category_id' => $category,
            ]);
        }

        return redirect(route('panel.posts'));
    }

    public function delete(Request $request)
    {
        Post::find($request->id)->delete();

        return redirect()->route('panel.posts');
    }
}
