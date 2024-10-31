<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryControllers;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/product-list2', [ProductController::class, 'getAll2'])->name('product.list');
Route::get('/product-add', [ProductController::class, 'showAddProductForm'])->name('product.add');
// Thêm sản phẩm
Route::get('/product-add', [ProductController::class, 'add'])->name('product.add');
Route::get('/product-add', [ProductController::class, 'create'])->name('product.add');

Route::delete('/product-list2/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::post('/product-save', [ProductController::class, "save"])->name('product.save');

Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');


// Route để cập nhật sản phẩm
Route::post('/product-update', [ProductController::class, 'update']);
Route::get('/category-list', [CategoryControllers::class, 'getAll'])->name('category.list');

Route::get('/category-add', [CategoryControllers::class, 'add'])->name('category.add');
Route::post('/category-save', [CategoryControllers::class, "save"])->name('category.save');
Route::get('/category-edit/{id}', [CategoryControllers::class, 'edit'])->name('category.edit');
Route::post('/category-update', [CategoryControllers::class, 'update']);
Route::delete('/category-list/delete/{id}', [CategoryControllers::class, 'delete'])->name('category.delete');

// Users

Route::get('/user-list', [UserController::class, 'getAllUsers'])->name('user.list');
Route::get('/user-add', [UserController::class, 'add'])->name('user.add');
Route::post('/user-save', [UserController::class, "save"])->name('user.save');
Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user-update', [UserController::class, "update"])->name('user.update');
Route::delete('/user-delete/{id}', [UserController::class, 'delete'])->name('user.delete');












Route::get('/admin', [AdminController::class, 'index'])->name('admin');



Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');








