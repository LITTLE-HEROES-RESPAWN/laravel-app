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


Route::get('articles/create', [ArticleController::class, 'create'])->middleware('auth')->name('articles.create');
Route::post('articles/create/confirm', [ArticleController::class, 'createConfirm'])->middleware('auth')->name('articles.create.confirm');
Route::put('articles/store/{article}', [ArticleController::class, 'store'])->middleware('auth')->name('articles.store');
