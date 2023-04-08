<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('product/{product}', [HomeController::class, 'product'])->name('home.product_detail');
Route::post('product-comment/{product}', [HomeController::class, 'productComment'])->name('home.product_comment');
Route::get('delete-comment/{comment}', [HomeController::class, 'deleteComment'])->name('home.deleteComment');

// route sẽ hiển thị form login
Route::get('login', [CustomerController::class, 'login'])->name('login');
// route này validate dữ liệu khi submit form
Route::post('login', [CustomerController::class, 'post_login']);
