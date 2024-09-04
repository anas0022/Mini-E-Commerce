<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::prefix('admin')->group(function () {
   
    Route::get('admin/dashboard', [AdminController::class,'home'])->name('home');
    Route::get('admin/orders', [AdminController::class, 'order'])->name('orders');
    Route::get('admin/product', [AdminController::class, 'product'])->name('product');
    Route::get('/add_product', [AdminController::class, 'add_product'])->name('add_product');
    Route::post('/productpost', [AdminController::class, 'add_product_post'])->name('product.post');
    Route::delete('/delete/{id}', [AdminController::class,'delete'])->name('delete_product');
    Route::get('/update/{id}',[AdminController::class,'update'])->name('update_product');
    Route::post('/updateproduct/{id}',[AdminController::class,'update_product'])->name('update.product');
  

});

Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/Registerpost', [UserController::class,'register_post'])->name('register.post');
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/loginpost', [UserController::class,'login_post'])->name('login.post');
Route::get('/', [UserController::class,'home'])->name('home');
Route::post('/orders', [UserController::class, 'order'])->name('order');
