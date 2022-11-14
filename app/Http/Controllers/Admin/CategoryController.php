<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function create(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'unique:categories|required',
        ]);

        if ($validation->fails()) {
            $errors = (array) $validation->errors()->messages();
            $errors = $errors['name'];
        } else {
            $errors = null;
            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
        }

        return redirect()->back()->withErrors(['msg' => $errors]);
    }

    public function activityUpdate(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'value' => 'in:1,0|required',
        ]);

        if ($validation->fails()) {
            exit();
        }

        Category::where('id', $request->id)->update(['is_active' => $request->value]);

        return redirect()->back();

    }
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|unique:categories',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($validation->errors())]);
        }

        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Category::where('id', $request->id)->delete();
        return redirect()->route('panel.categories');
    }
}