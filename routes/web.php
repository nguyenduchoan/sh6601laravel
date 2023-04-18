<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
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

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile')->middleware('auth');
Route::group(['prefix' => 'customer'], function () {
    // Phương thức get hiển thị form login
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');
    //Phương thức post để thực hiện login khi submit form
    Route::post('login', [CustomerController::class, 'post_login']);
    // Phương thức get hiển thị form register
    Route::get('register', [CustomerController::class, 'register'])->name('customer.register');
    //Phương thức post để thực hiện register khi submit form
    Route::post('register', [CustomerController::class, 'post_register']);
});


Route::group(['prefix' => 'home'], function () {
    // HIển thị trang màn hình chính 
    Route::get('categories', [HomeCateController::class, 'index'])->name('home.index');
    // hiển thị trang sản phẩm chi tiết
    // Route::get()

});

Route::group(['prefix' => 'Admin'], function () {
    // Hiển thị trang Admin
    Route::get('categories', [AdminController::class, 'index'])->name('Admin.index');
    // thêm dữu liệu sản phẩm vào dâtbase
    Route::get('categories/create', [AdminController::class, 'create_category'])->name('Admin.create');


    // Nhận phương thức post để thêm vào đb
    Route::post('categories', [CategoryController::class, 'store'])->name('Admin.store');
    Route::delete('categorry/{id}', [CategoryController::class, 'delete'])->where(["id" => "[0-9]+"])->ndame('Admin.delete');
});
