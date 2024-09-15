<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', [AdminController::class,'home'])->name('home');
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('contact',[HomeController::class,'contact'])->name('contact');
// Route::get('/details/{id}', [HomeController::class,'details'])->name('details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    route::get('/home',[HomeController::class,'auth'])->name('home');
 //     Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// category routes
Route::resource('categories',CategoryController::class);

// products routes
Route::resource('products', ProductController::class);
// order view


});
Route::get('/details/{id}', [HomeController::class,'details'])->name('details');

//cart
Route::post('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart')->middleware(['auth','verified']);
Route::get('show_cart', [HomeController::class, 'show_cart'])->name('show_cart')->middleware(['auth','verified']);
Route::get('remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
Route::post('/update_cart/{id}', [HomeController::class, 'update'])->name('update_cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// order
Route::post('cash_order', [CheckoutController::class, 'cash_order'])->name('cash_order')->middleware(['auth','verified']);
Route::post('/view.orders', [OrderController::class, 'view_order'])->name('view.orders')->middleware(['auth','verified']);;
