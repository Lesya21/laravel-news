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

Route::get('/', function () {
    return view('welcome');
});

//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'detail'])
    ->where('id', '\d+')
    ->name('news.detail');

//admin
Route::get('/admin', [AdminNewsController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminNewsController::class, 'create']);
Route::get('/admin/edit/{id}', [AdminNewsController::class, 'edit']);
