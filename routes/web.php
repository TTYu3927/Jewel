<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});
Route::view(('/admin'), 'admin.index')->name('admin.index');
Route::resource('customers', CustomerController::class);