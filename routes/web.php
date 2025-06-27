<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view(('/admin'), 'admin.index')->name('admin.index');
Route::resource('category', CategoryController::class,);
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');