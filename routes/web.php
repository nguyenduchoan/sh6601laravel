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

// Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home.index');
// Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile')->middleware('auth');

// Đăng kí đăng nhập 
Route::group(['prefix' => 'customer'], function () {
    // Phương thức get hiển thị form login
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');
    //Phương thức post để thực hiện login khi submit form
    // Route::post('login', [CustomerController::class, 'post_login']);
    Route::post('login', function () {
        return "check o day";
    });
    // Phương thức get hiển thị form register
    Route::get('register', [CustomerController::class, 'register'])->name('customer.register');
    //Phương thức post để thực hiện register khi submit form
    Route::post('register', [CustomerController::class, 'post_register']);
});


// Customer
// HIển thị trang màn hình chính 
Route::get('home/categories', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['cus'])->prefix('home')->group(function () {
    // Truy cập các trang khác nếu đã đăng nhập
    // Route::group(['middleware' => 'cus'], function () {
    Route::get('categories/{product}', [HomeController::class, 'product'])->name('home.product_detail');
    // });
});

// Trang cho Admin 
Route::middleware(['cus', 'admin'])->prefix('admin')->group(function () {
    // Hiển thị trang Admin
    Route::get('categories', [AdminController::class, 'index'])->name('admin.index');
    // thêm dữ liệu sản phẩm vào dâtbase
    Route::get('categories/create', [AdminController::class, 'create_category'])->name('admin.create');

    // Nhận phương thức post để thêm vào đb
    Route::post('categories', [AdminController::class, 'store'])->name('admin.store');
    // Nhận phương thức để xóa khỏi db
    Route::delete('category/{id}', [AdminController::class, 'delete'])->where(["id" => "[0-9]+"])->name('admin.delete');
});
