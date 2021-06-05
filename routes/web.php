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

Route::get('/', function () {
   // dd('asd');
    return view('welcome');
});

//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'detail'])
    ->where('id', '\d+')
    ->name('news.detail');

//contacts
Route::get('/contacts', [NewsController::class, 'contacts'])
    ->name('contacts');

//admin

Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create']);
Route::get('/admin/categories/edit/{id}', [AdminCategoryController::class, 'edit']);

Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
Route::get('/admin/news/create', [AdminNewsController::class, 'create']);
Route::get('/admin/news/edit/{id}', [AdminNewsController::class, 'edit']);

//forms
Route::post('/callback', [FormController::class, 'saveCallback'])
    ->name('forms.callback');
Route::post('/get-data', [FormController::class, 'saveGetData'])
    ->name('forms.data');
