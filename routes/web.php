<?php

use App\Http\Controllers\buyController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\supplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', productController::class);
Route::resource('suppliers', supplierController::class);
Route::resource('buys', buyController::class);
Route::resource('product_categories', categoryController::class);
Route::resource('users', clienteController::class);
Route::resource('orders', orderController::class);
Route::get('/contactanos', function () {
    return view('vistasextras.contactanos');
})->name('contactanos');
Route::get('/nosotros', function () {
    return view('vistasextras.sobrenoso');
})->name('nosotros');