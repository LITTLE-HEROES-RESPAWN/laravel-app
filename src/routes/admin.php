<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth:admin')->name('dashboard');


require __DIR__.'/admin_auth.php';

Route::prefix('articles')
    ->controller(ArticleController::class)
    ->name('articles.')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('download', 'download')->name('download');
        Route::get('{article}', 'show')->name('show');
    });

// ユーザー管理
Route::prefix('users')
    ->controller(UserController::class)
    ->name('users.')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('download', 'download')->name('download');
        Route::get('{user}', 'show')->name('show');
    });
