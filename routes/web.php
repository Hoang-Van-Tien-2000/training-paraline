<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
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
    return view('admin.home');
});

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Đăng Ký 
Route::get('/admin/register', [AuthController::class,'register'])->name('admin.register');
Route::post('/admin/postRegister',[AuthController::class,'postRegister'])->name('admin.postRegister');
// Đăng Nhập
Route::get('/admin/login',  [AuthController::class,'login'])->name('admin.login');
Route::post('/admin/postLogin', [AuthController::class,'postLogin'])->name('admin.postLogin');
// Đăng xuất
Route::get('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');

// Route Admin
Route::group(['prefix' => '/admin','as'=>'admin.','middleware' => 'checkLogin'], function () {
    // Quản trị
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::resource('/category', CategoryController::class);
});