<?php

use App\Http\Controllers\Acount\IndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('start');
});



Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');
Route::get('/news/category/{categoryId}', [NewsController::class, 'newsByCategory'])
    ->where('categoryId', '\d+')
    ->name('news.category');
Route::get('/feedback', [FeedbackController::class, 'index'])
    ->name('feedback');
Route::post('/feedback/store', [FeedbackController::class, 'store'])
    ->name('feedback.store');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', IndexController::class);
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
    //Admin group
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', AdminUserController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
