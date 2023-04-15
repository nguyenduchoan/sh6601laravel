<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customercontroller;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::group(['prefix'=>'customer'], function(){
    Route::get('login', [customercontroller::class, 'login'])->name('customer.login');
    Route::post('login', [customercontroller::class, 'post_login']);
    Route::get('register', [customercontroller::class, 'register'])->name('customer.register');
    Route::post('register', [customercontroller::class, 'post_register']);
    Route::get('home', function(){
        return view('customer.home');
    })->name('home');
    Route::get('logout', [customercontroller::class, 'logout'])->name('customer.logout');
});
