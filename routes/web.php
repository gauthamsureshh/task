<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'homePage'])->name('homepage');

#routes for authentications like login and register
Route::get('/login',[PageController::class,'loginPage'])->name('loginpage');
Route::post('/login',[PageController::class,'logIn'])->name('login.post');
Route::get('/register', [PageController::class,'registerPage'])->name('registerpage');
Route::post('/register', [PageController::class,'register'])->name('register.post');
Route::get('/logout', [PageController::class,'logout'])->name('logout');

#routes for CRUD operation on Customer
Route::get('/customer/list',[CustomerController::class,'customerList'])->name('customerlist');
Route::get('/customer/create',[CustomerController::class,'customerCreate'])->name('customercreate');
Route::post('/customer', [CustomerController::class,'customerStore'])->name('create.post');
Route::get('/customer/edit/{customer}/', [CustomerController::class,'customerEdit'])->name('customeredit');
Route::put('/edit/{customer}/', [CustomerController::class,'customerUpdate'])->name('update.put');
Route::delete('/delete/{customer}', [CustomerController::class,'customerDestroy'])->name('customerdelete');