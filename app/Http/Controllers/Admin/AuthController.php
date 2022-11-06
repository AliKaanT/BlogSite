<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $form_validation = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if ($form_validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($form_validation->errors())]);
        }

        Auth::guard('admin')->attempt($request->only(['email', 'password']), $request['remember_me']);

        if (!Auth::guard('admin')->check()) {
            return redirect()->back()->withErrors(['msg' => 'Email veya parola hatalı!']);
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        if (!Auth::guard('admin')->check()) {
            return redirect('/panel/login');
        }
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->only('name', 'email', 'password', 'new_pwd', 'new_pwd_rpt'), [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required',
            'new_pwd' => '',
            'new_pwd_rpt' => 'same:new_pwd|required_with:new_pwd',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors(['msg' => json_encode($validation->errors())]);
        }

        if (!Hash::check($request->password, Auth::guard('admin')->user()->password)) {
            return redirect()->back()->withErrors(['msg' => 'password is incorrect']);
        }
        $user = Admin::find(Auth::guard('admin')->user()->id)->first();

        if (!empty($request->new_pwd)) {
            $user->password = bcrypt($request->new_pwd);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back();
    }
}
