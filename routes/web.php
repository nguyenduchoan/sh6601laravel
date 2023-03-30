<?php

use App\Http\Controllers\HomeController;
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

Route::get('', [HomeController::class, 'index'])->name('home.index');
// route sẽ hiển thị form login
Route::get('login', [HomeController::class, 'login'])->name('home.login');

// route này validate dữ liệu khi submit form
Route::post('login', [HomeController::class, 'check_login']);

Route::get('/home/{id}', function($id) {
    return "Đây là sản phẩm thứ: " . $id;
})->where("id", '[0-9]+');

// Route::prefix('category')->where("id", '[0-9]+')->group(function() {
//     Route::get('/{id}', function($id) {
//         return "Đây là trang category. Sản phẩm thứ: " . $id;
//     });
//     Route::get('/add', function() {
//         return "Đây là trang thêm";
//     });

//     Route::get('/edit/{id}', function($id) {
//         return "Đây là trang sửa. Sửa sản phẩm: " . $id;
//     });

//     Route::get('/delete/{id}', function($id) {
//         return "Đây là trang xóa. Xóa sản phẩm: " . $id;
//     });
// });

Route::group([
    "prefix" => "category",
    "where" => [
        "id" => "[0-9]+"
    ]
], function () {
    Route::get('/{id}', function ($id) {
        return "Đây là trang category. Sản phẩm thứ: " . $id;
    });
    Route::get('/add', function () {
        return "Đây là trang thêm";
    });


    Route::get('/edit/{id}', function ($id) {
        return "Đây là trang sửa. Sửa sản phẩm: " . $id;
    });


    Route::get('/delete/{id}', function ($id) {
        return "Đây là trang xóa. Xóa sản phẩm: " . $id;
    });
});

