<?php

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

use \App\Http\Controllers\News\NewsController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\FormController;
use \App\Http\Controllers\Admin\UsersController as AdminUserController;
use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\User\UsersController as UserResourceController;

Route::get('/', function () {
   // dd('asd');
    return view('welcome');
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'verified.custom'], function() {
    Route::resource('/categories', AdminCategoryController::class)->middleware('auth');
    Route::resource('/news', AdminNewsController::class)->middleware('auth');
    Route::resource('/users', AdminUserController::class)->middleware('auth');
});

//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'detail'])
    ->where('id', '\d+')
    ->name('news.detail');

//contacts
Route::get('/contacts', [NewsController::class, 'contacts'])
    ->name('contacts');

//forms
Route::post('/callback', [FormController::class, 'saveCallback'])
    ->name('forms.callback');
Route::post('/get-data', [FormController::class, 'saveGetData'])
    ->name('forms.data');

Route::get('/home', [UsersController::class, 'profile'])->middleware('auth')->name('home');
Route::put('/users/', [UserResourceController::class, 'update'])->middleware('auth')->name('user.change');
