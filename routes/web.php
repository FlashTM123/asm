<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/product-list2', [ProductController::class, "getAll2"]);
Route::delete('/product-list2/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product-add', [ProductController::class, "add"]);
Route::post('/product-save', [ProductController::class, "save"]);
// Route để hiển thị form chỉnh sửa sản phẩm
Route::get('/product-edit/{id}', [ProductController::class, 'edit']);

// Route để cập nhật sản phẩm
Route::post('/product-update', [ProductController::class, 'update']);
