<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/test',function (){
 $product=Product::find(99);
return view('test',['product'=>$product]);
});


Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show',]);

Route::get('/phones', [ProductController::class, 'phones']);
Route::get('/laptops', [ProductController::class, 'laptops']);
Route::get('/pcs', [ProductController::class, 'pcs']);

Route::get('/cart/{id}', [CartController::class, 'show',])->middleware('auth')->can('show-cart','id');
Route::post('/cart/{id}', [CartController::class, 'store',])->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'destroyItem',])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');




//admin section

Route::middleware( 'can:is_admin','auth',)->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index']);

    Route::resource('products', AdminProductController::class);

    Route::resource('orders', OrderController::class);

    Route::resource('users', AdminUserController::class);

});
