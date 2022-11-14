<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->only('name', 'content'), [
            'name' => 'required|unique:pages',
            'content' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($validation->errors())]);
        }

        Page::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
        ]);

        return redirect()->route('panel.pages');

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

        Page::where('id', $request->id)->update(['is_active' => $request->value]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'content' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($validation->errors())]);
        }

        Page::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Page::find($request->id)->delete();
        return redirect()->route('panel.pages');
    }
}