<?php

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
