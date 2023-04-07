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

// Route::get('', [HomeController::class, 'index'])->name('home.index');
// // route sẽ hiển thị form login
// Route::get('login', [HomeController::class, 'login'])->name('home.login');

// // route này validate dữ liệu khi submit form
// Route::post('login', [HomeController::class, 'check_login']);

// Route::get('/home/{id}', function($id) {
//     return "Đây là sản phẩm thứ: " . $id;
// })->where("id", '[0-9]+');

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

// Route::group([
//     "prefix" => "category",
//     "where" => [
//         "id" => "[0-9]+"
//     ]
// ], function () {
//     Route::get('/{id}', function ($id) {
//         return "Đây là trang category. Sản phẩm thứ: " . $id;
//     });
//     Route::get('/add', function () {
//         return "Đây là trang thêm";
//     });


//     Route::get('/edit/{id}', function ($id) {
//         return "Đây là trang sửa. Sửa sản phẩm: " . $id;
//     });


//     Route::get('/delete/{id}', function ($id) {
//         return "Đây là trang xóa. Xóa sản phẩm: " . $id;
//     });
// });

// Route::group([
//     "prefix" => "category"
// ], function () {
//     Route::get('/', function () {
//         return [CategoryController::class, 'index'];
//     });
// });


Route::get("/", function () {
    return "Trang home!!!";
});


Route::get("/category", [CategoryController::class, "index"])->name('category.index');

// GET categorry/create để hiển thị form nhập dữ liệu
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
// POST categorry để nhận dữ liệu khi submit form
Route::post('category', [CategoryController::class, 'store'])->name('category.createToDB');

//DELETE category/{id} phương thức DELETE, khác với GET, hay POST
Route::delete('categorry/{id}', [CategoryController::class, 'delete'])
    ->where(["id" => "[0-9]+"])->name('category.delete');

Route::get('categorry/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');

Route::put('categorry/{id}', [CategoryController::class, 'update'])->name('category.update');

// GET upload
Route::get('upload', [UploadController::class, 'form'])->name('upload.form');
// POST upload
Route::post('upload', [UploadController::class, 'upload'])->name('upload.upload');


Route::get('product', [ProductController::class, 'index'])->name('product.index');

Route::get('product-join', [ProductController::class, 'indexJoin'])->name('product.index');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'customer', 'middleware' => 'cus'], function () {
    Route::get("/", function () {
        return view("home");
    })->middleware('cus')->name("customer.home");
    // Phương thức get hiển thị form login
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');
    //Phương thức post để thực hiện login khi submit form
    Route::post('login', [CustomerController::class, 'post_login']);
    // Phương thức get hiển thị form register
    Route::get('register', [CustomerController::class, 'register'])->name('customer.register');
    //Phương thức post để thực hiện register khi submit form
    Route::post('register', [CustomerController::class, 'post_register']);
});
