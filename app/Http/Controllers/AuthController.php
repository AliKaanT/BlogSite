<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $form_validation = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($form_validation->fails()) {
            return view('panel/login', [
                'errors' => ($form_validation->errors()->all())
            ]);
        }

        Auth::attempt($request->only(['email', 'password']));

        if (!Auth::check()) {
            return view('panel/login', [
                'errors' => ['Email veya parola hatalı!']
            ]);
        }

        return Auth::user();
    }
}