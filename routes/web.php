<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PanelViewController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Site\SiteViewController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

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
//User routes
Route::get('/', [SiteViewController::class, 'index'])->name('index');

Route::get('/post/{slug}', [SiteViewController::class, 'single_post'])->name('single_post');
Route::get('/posts', [SiteViewController::class, 'posts'])->name('posts');

Route::get('/categories', [SiteViewController::class, 'categories'])->name('categories');
Route::get('/category/{slug}', [SiteViewController::class, 'single_category'])->name('single_category');

Route::get('/page/{slug}', [SiteViewController::class, 'additional_pages'])->name('additional_pages');

//Admin routes
Route::get('panel/login', [PanelViewController::class, 'login'])->name('login')->middleware('guest');
Route::post('panel/login', [AuthController::class, 'login'])->name('post_login');

Route::group(
    ['prefix' => 'panel', 'as' => 'panel.', 'middleware' => ['auth:admin']],
    function () {

        //Get requests
        Route::get('/', [PanelViewController::class, 'index'])->name('panel');

        Route::get('/settings', [PanelViewController::class, 'settings'])->name('settings');
        Route::get('/profile', [PanelViewController::class, 'profile'])->name('profile');

        Route::get('/categories', [PanelViewController::class, 'categories'])->name('categories');
        Route::get('/category/{id}', [PanelViewController::class, 'edit_category'])->name('edit_category');

        Route::get('/posts', [PanelViewController::class, 'posts'])->name('posts');
        Route::get("/post/{id}", [PanelViewController::class, 'edit_post'])->name('edit_post');
        Route::get("/newpost", [PanelViewController::class, 'create_post'])->name('create_post');

        Route::get('/pages', [PanelViewController::class, 'pages'])->name('pages');
        Route::get('/page/{id}', [PanelViewController::class, 'edit_page'])->name('edit_page');
        Route::get("/newpage", [PanelViewController::class, 'create_page'])->name('create_page');

        // Post requests
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::post('/settingsUpdate', [SiteSettingsController::class, 'update'])->name('settings_update');
        Route::post('/profileUpdate', [AuthController::class, 'update'])->name('profile_update');

        Route::post('/categoryCreate', [CategoryController::class, 'create'])->name('category_create');
        Route::post('/categoryUpdate', [CategoryController::class, 'update'])->name('category_update');
        Route::post('/categoryDelete', [CategoryController::class, 'delete'])->name('category_delete');
        Route::get('/categoryActivityUpdate', [CategoryController::class, 'activityUpdate'])->name('category_activity_update');

        Route::post('/postCreate', [PostController::class, 'create'])->name('post_create');
        Route::post('/postUpdate', [PostController::class, 'update'])->name('post_update');
        Route::post('/postDelete', [PostController::class, 'delete'])->name('post_delete');
        Route::get('/postActivityUpdate', [PostController::class, 'activityUpdate'])->name('post_activity_update');
        Route::get('/postHighlightUpdate', [PostController::class, 'highlightUpdate'])->name('post_highlight_update');

        Route::post('/pageCreate', [PageController::class, 'create'])->name('page_create');
        Route::post('/pageUpdate', [PageController::class, 'update'])->name('page_update');
        Route::post('/pageDelete', [PageController::class, 'delete'])->name('page_delete');
        Route::get('/pageActivityUpdate', [PageController::class, 'activityUpdate'])->name('page_activity_update');
    }
);