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
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\SocialController;

Route::get('/', function () {
   // dd('asd');
    return view('welcome');
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'verified.custom'], function() {
    Route::resource('/categories', AdminCategoryController::class)->middleware('auth');
    Route::resource('/news', AdminNewsController::class)->middleware('auth');
    Route::resource('/users', AdminUserController::class)->middleware('auth');
    Route::get('/parser', [ParserController::class, 'index'])->middleware('auth')->name('news.parser');
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
Route::put('/users/{user}', [UserResourceController::class, 'update'])->middleware('auth')->name('user.update');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login/vk', [SocialController::class, 'login'])
        ->name('vk.login');
    Route::get('/callback/vk', [SocialController::class, 'callback'])
        ->name('vk.callback');
});
