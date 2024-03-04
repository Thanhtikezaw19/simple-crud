<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['auth'])->group(function () {
    // Home page set to products index
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Product routes accessible only after login
    Route::resource('products', ProductController::class);
});

Auth::routes();

//Route::resource('products', ProductController::class);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
