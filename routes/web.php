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

Route::group(['middleware' => 'auth'], function () { 
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/products/add-product', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.add-product');
    Route::post('/products/add-product', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');

    Route::get('/warehouses', [\App\Http\Controllers\WarehouseController::class, 'index'])->name('warehouses');
    Route::get('/warehouses/add-warehouse', [\App\Http\Controllers\WarehouseController::class, 'create'])->name('warehouses.add-warehouse');
    Route::post('/warehouses/add-warehouse', [\App\Http\Controllers\WarehouseController::class, 'store'])->name('warehouses.store');

    Route::get('/stores', [\App\Http\Controllers\StoreController::class, 'index'])->name('stores');
    Route::get('/stores/add-store', [\App\Http\Controllers\StoreController::class, 'create'])->name('stores.add-store');
    Route::post('/stores/add-store', [\App\Http\Controllers\StoreController::class, 'store'])->name('stores.store');
});

Route::group(['middleware' => 'warehouse.manager.auth', 'auth'], function () { 
    Route::get('/warehouses/{id}', [\App\Http\Controllers\WarehouseController::class, 'show'])->name('warehouses.show');
    Route::get('/warehouses/{id}/edit', [\App\Http\Controllers\WarehouseController::class, 'edit'])->name('warehouses.edit');
    Route::put('/warehouses/{id}', [\App\Http\Controllers\WarehouseController::class, 'update'])->name('warehouses.update');
});

Route::group(['middleware' => 'auth','store.manager.auth'], function () { 
    Route::get('/stores/{id}', [\App\Http\Controllers\StoreController::class, 'show'])->name('stores.show');
    Route::get('/stores/{id}/edit', [\App\Http\Controllers\StoreController::class, 'edit'])->name('stores.edit');
    Route::put('/stores/{id}', [\App\Http\Controllers\StoreController::class, 'update'])->name('stores.update');
});

require __DIR__.'/auth.php';
