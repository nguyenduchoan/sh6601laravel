<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [CategoryController::class, 'listAll'])->name('home');

Route::get('/{id}', [CategoryController::class, 'listById'])->name('category');

Route::get('/detail/{id}',[ProductController::class, 'detail'])->name('product-detail');

Route::prefix('/customer')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('customer.login');
//    Route::post('/login', [UserController::class, 'post_login']);
    Route::post('/login', function () {
        dd("check login");
        return "OK";
    });
    Route::get('/register', [UserController::class, 'register'])->name('customer.register');
    Route::post('/register', [UserController::class, 'post_register']);
});