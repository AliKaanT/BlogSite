<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $form_validation = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if ($form_validation->fails()) {
            return view('panel/login', [
                'errors' => ($form_validation->errors()->all())
            ]);
        }

        Auth::guard('admin')->attempt($request->only(['email', 'password']), $request['remember_me']);

        if (!Auth::guard('admin')->check()) {
            return view('panel/login', [
                'errors' => ['Email veya parola hatalı!']
            ]);
        }

        return redirect('/panel');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        if (!Auth::guard('admin')->check()) {
            return redirect('/panel/login');
        }
    }
}