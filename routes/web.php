<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/warehouses', function () {
    return view('warehouses');
})->middleware(['auth'])->name('warehouses');

Route::get('/stores', function () {
    return view('stores');
})->middleware(['auth'])->name('stores');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'products'])->middleware(['auth'])->name('products');

require __DIR__.'/auth.php';
