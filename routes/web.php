<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::middleware('only_guest')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'authenticating']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logout']);

    Route::get('/', [ProductController::class, 'index']);

    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/', [ProductController::class, 'index']);
});
