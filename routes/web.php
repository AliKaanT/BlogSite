<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelViewController;

/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register web routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | contains the "web" middleware group. Now create something great!
 |
 */

//REQUESTS WHICH RETURNS VIEW
Route::get('panel', [PanelViewController::class, 'index']);
Route::get('panel/login', [PanelViewController::class, 'login']);
Route::get('panel/settings', [PanelViewController::class, 'settings']);

//POST REQUESTS
Route::post('post/login', [AuthController::class, 'login']);

Route::post('post/settings', function (Request $request) {
    return $request;
});