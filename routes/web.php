<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
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

//Admin group
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/', 'admin.index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
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
Route::view('/feedback', 'feedback')
    ->name('feedback');
