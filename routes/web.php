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
// Register
Route::get('/admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('/admin/postRegister', [AuthController::class, 'postRegister'])->name('admin.postRegister');
// Login
Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/postLogin', [AuthController::class, 'postLogin'])->name('admin.postLogin');
// Logout
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Route Admin
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'checkLogin'], function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Teams
    Route::get('/team/add', [TeamController::class, 'add'])->name('team.add');
    Route::post('/team/add_confirm', [TeamController::class, 'addConfirm'])->name('team.add_confirm');
    Route::post('/team/add_save', [TeamController::class, 'addConfirmSave'])->name('team.add_save');
    Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('/team/edit_confirm/{id}', [TeamController::class, 'editConfirm'])->name('team.edit_confirm');
    Route::post('/team/edit_save/{id}', [TeamController::class, 'editConfirmSave'])->name('team.edit_save');
    Route::get('/team/search', [TeamController::class, 'search'])->name('team.search');
    Route::get('/team/delete/{id}', [TeamController::class, 'delete'])->name('team.delete');
    Route::get('/team/reset_add_edit', [EmployeeController::class, 'resetAddEdit'])->name('team.reset_add_edit');
    // Employee
    Route::get('/employee/add', [EmployeeController::class, 'add'])->name('employee.add');
    Route::get('/employee/search', [EmployeeController::class, 'search'])->name('employee.search');
    Route::post('/employee/add_confirm', [EmployeeController::class, 'addConfirm'])->name('employee.add_confirm');
    Route::post('/employee/add_save', [EmployeeController::class, 'addConfirmSave'])->name('employee.add_save');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/edit_confirm/{id}', [EmployeeController::class, 'editConfirm'])->name('employee.edit_confirm');
    Route::post('/employee/edit_save/{id}', [EmployeeController::class, 'editConfirmSave'])->name('employee.edit_save');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::get('/employee/reset_add_edit', [EmployeeController::class, 'resetAddEdit'])->name('employee.reset_add_edit');
    // Export CSV
    Route::get('/employee/export_csv', [EmployeeController::class, 'exportCSV'])->name('employee.export_csv');
});
