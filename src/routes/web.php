<?php

use App\Http\Controllers\ArticleController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('articles')
    ->middleware('auth')
    ->controller(ArticleController::class)
    ->name('articles.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('mypage', 'myPage')->name('index.mypage');
        Route::get('create', 'create')->name('create');
        Route::get('{article}', 'show')->name('show');
        Route::post('create/confirm', 'createConfirm')->name('create.confirm');
        Route::put('store', 'store')->name('store');
    });
