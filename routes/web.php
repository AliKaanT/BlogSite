<?php

use App\Models\User;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelViewController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SiteSettingsController;

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
Route::get('panel/login', [PanelViewController::class, 'login'])->name('login');

//POST REQUESTS
Route::post('panel/login', [AuthController::class, 'login']);

Route::post('post/settings', function (Request $request) {
    return $request;
});

Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => ['auth:admin']], function () {

    //Get requests
    Route::get('/', [PanelViewController::class, 'index'])->name('panel');
    Route::get('/settings', [PanelViewController::class, 'settings'])->name('settings');
    Route::get('/pages', [ /***********************************/])->name('pages');
    Route::get('/categories', [ /***********************************/])->name('categories');
    Route::get('/posts', [ /***********************************/])->name('posts');


    // Post requests
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/settings', [SiteSettingsController::class, 'update'])->name('settings_post');
});

// title slug content image created updated