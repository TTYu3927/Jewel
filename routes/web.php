<?php

use App\Http\Controllers\Admin\DashboardChartController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/** Admin login*/
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('adminlogin');
Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

/** Admin panel routes */
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('layouts.index');
})->name('admin.dashboard');

Route::get('/admin/dashboard-chart', [DashboardChartController::class, 'index'])->name('dashboardchart');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::resource('products', ProductController::class)->except(['show']);

    Route::get('/admin/customers', [CustomerController::class, 'customerList'])->name('admin.customers');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.order');

    Route::resource('employees', EmployeeController::class)->except(['show']);
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');





});

/** Public shop & customer routes*/
Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.register');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.detail');
Route::get('/customers/contact', [CustomerController::class, 'contact'])->name('customers.contact');
Route::get('/contact', [CustomerController::class, 'contact'])->name('contact');
Route::get('/shop', [ProductController::class, 'shop'])->name('customers.shop');



/** Auth Routes (Customer)*/
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'customerLogin'])->name('login');
Route::get('/logout', [AuthController::class, 'customerlogout'])->name('logout');

/** Cart Routes*/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/payment', [CartController::class, 'payment'])->name('customers.payment');

/**
 * Public Product Routes for Customers*/
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // Customer product listing
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // Product detail view

Route::post('/stripe/pay', [StripeController::class, 'checkout'])->name('stripepay');
Route::get('/payment/success', function () {
    return view('customers.success');})->name('customers.success');

// Gift Card route (view)
Route::get('/giftcard', function () {
    return view('customers.giftcard');})->name('customers.giftcard');

// Add gift card to cart
Route::post('/giftcard/add-to-cart', [CartController::class, 'addGiftCard'])->name('giftcard.addtocart');


