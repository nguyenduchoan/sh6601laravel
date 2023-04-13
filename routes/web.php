<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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
*/Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('product/{product}', [HomeController::class, 'product'])->name('home.product_detail');
Route::post('product-comment/{product}', [HomeController::class, 'productComment'])->name('home.product_comment');
Route::get('delete-comment/{comment}', [HomeController::class, 'deleteComment'])->name('home.deleteComment');

// route sẽ hiển thị form login
Route::get('login', [HomeController::class, 'login'])->name('home.login');
// route này validate dữ liệu khi submit form
Route::post('login', [HomeController::class, 'check_login']);

/**Nhóm route xử lý giỏ hàng */
Route::group(['prefix' => 'cart'], function() {
    Route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('view', [CartController::class, 'view'])->name('cart.view');
});