<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    function new (Request $request) {

        $validation = Validator::make($request->all(), [
            'name' => 'unique:categories|required',
        ]);

        if ($validation->fails()) {
            $errors = (array)$validation->errors()->messages();
            $errors = $errors['name'];
        } else {
            $errors = null;
            Category::create([
                'name' => $request->name,
            ]);
        }

        return redirect()->back()->withErrors(['msg' => $errors]);
    }

    public function update(Request $request)
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
}
