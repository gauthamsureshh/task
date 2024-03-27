<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'homePage'])->name('homepage');

#routes for authentications like login and register
Route::get('/login',[PageController::class,'loginPage'])->name('loginpage');
Route::post('/login',[PageController::class,'logIn'])->name('login.post');
Route::get('/register', [PageController::class,'registerPage'])->name('registerpage');
Route::post('/register', [PageController::class,'register'])->name('register.post');
Route::get('/logout', [PageController::class,'logout'])->name('logout');
Route::get('/user/edit/{user}',[PageController::class,'userEdit'])->name('useredit');
Route::put('/user/edit/{user}',[PageController::class,'userUpdate'])->name('userupdate.put');

#routes for CRUD operations on Customer
Route::get('/customer/list',[CustomerController::class,'customerList'])->name('customerlist');
Route::get('/customer/create',[CustomerController::class,'customerCreate'])->name('customercreate');
Route::post('/customer', [CustomerController::class,'customerStore'])->name('create.post');
Route::get('/customer/edit/{customer}/', [CustomerController::class,'customerEdit'])->name('customeredit');
Route::put('/edit/{customer}/', [CustomerController::class,'customerUpdate'])->name('update.put');
Route::delete('/delete/{customer}', [CustomerController::class,'customerDestroy'])->name('customerdelete');

#routes for CRUD operations on Task
Route::get('/task/list',[TaskController::class,'taskList'])->name('tasklist');
Route::get('/task/create',[TaskController::class,'taskCreate'])->name('taskcreate');
Route::post('/task', [TaskController::class,'taskStore'])->name('taskcreate.post');
Route::get('/task/edit/{task}',[TaskController::class,'taskEdit'])->name('task.edit');
Route::put('/task/edit/{task}/',[TaskController::class,'taskUpdate'])->name('taskupdate.put');
Route::delete('/task/delete/{task}',[TaskController::class,'taskDestroy'])->name('taskdelete');

#routes for CRUD operations on Invoice
Route::get('/invoice/list',[InvoiceController::class,'invoiceList'])->name('invoicelist');
Route::get('/invoice/create',[InvoiceController::class,'invoiceCreate'])->name('invoicecreate');
Route::post('/invoice',[InvoiceController::class,'invoiceStore'])->name('invoice.post');
Route::get('/invoice/edit/{invoice}',[InvoiceController::class,'invoiceEdit'])->name('invoice.edit');
Route::put('/invoice/edit/{invoice}',[InvoiceController::class,'invoiceUpdate'])->name('invoice.put');
Route::delete('/invoice/delete/{invoice}',[InvoiceController::class,'invoiceDestroy'])->name('invoicedelete');
Route::get('/invoice/{invoice}',[InvoiceController::class,'invoiceShow'])->name('invoiceshow');