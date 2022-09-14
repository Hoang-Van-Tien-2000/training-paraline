<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EmployeeController;
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
})->middleware('checkLogin');
Auth::routes();
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
    // Quản lý Teams
    Route::get('/team/add', [TeamController::class,'add'])->name('team.add');
    Route::post('/team/add_confirm', [TeamController::class,'addConfirm'])->name('team.add_confirm');
    Route::post('/team/add_save', [TeamController::class,'addConfirmSave'])->name('team.add_save');
    Route::get('/team/edit/{id}', [TeamController::class,'edit'])->name('team.edit');
    Route::post('/team/edit_confirm/{id}', [TeamController::class,'editConfirm'])->name('team.edit_confirm');
    Route::post('/team/edit_save/{id}', [TeamController::class,'editConfirmSave'])->name('team.edit_save');
    Route::get('/team/search', [TeamController::class,'searchByName'])->name('team.search');
    Route::get('/team/delete/{id}', [TeamController::class,'delete'])->name('team.delete');
    // Quản lý Employee
    Route::get('/employee/add', [EmployeeController::class,'add'])->name('employee.add');
    Route::get('/employee/search', [EmployeeController::class,'search'])->name('employee.search');
    Route::post('/employee/add_confirm', [EmployeeController::class,'addConfirm'])->name('employee.add_confirm');
    Route::post('/employee/add_save', [EmployeeController::class,'addConfirmSave'])->name('employee.add_save');
});