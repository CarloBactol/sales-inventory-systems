<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CashPaymentController;
use App\Http\Controllers\InstallmentController;

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
    return view('welcome');
});


Auth::routes();


Route::middleware('isAdmin')->group(function () {
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/admin/orders-chart', [App\Http\Controllers\HomeController::class, 'orderChart'])->name('admin.orders');
    // Product
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'show']);
    Route::post('/store-product', [App\Http\Controllers\ProductController::class, 'store']);
    Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);

    // Brand
    Route::get('brand', [BrandController::class, 'index']);
    Route::get('/brand-edit/{id}', [BrandController::class, 'edit']);
    Route::get('create', [BrandController::class, 'create']);
    Route::post('brand-store', [BrandController::class, 'store']);
    Route::get('/brand-delete/{id}', [BrandController::class, 'destroy']);
    Route::put('/brand-update/{id}', [BrandController::class, 'update']);

    // Stock In 
    Route::get('/stock', [StockInController::class, 'index']);
    Route::get('/add-stock', [StockInController::class, 'create']);
    Route::post('/store-stock', [StockInController::class, 'store']);
    Route::get('/edit-stock/{id}', [StockInController::class, 'edit']);
    Route::put('/update-stock/{id}', [StockInController::class, 'update']);
    Route::get('/delete-stock/{id}', [StockInController::class, 'destory']);

    // Customer 
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/add-customer', [CustomerController::class, 'create']);
    Route::post('/store-customer', [CustomerController::class, 'store']);
    Route::get('/edit-customer/{id}', [CustomerController::class, 'edit']);
    Route::put('/update-customer/{d}', [CustomerController::class, 'update']);
    Route::get('/delete-customer/{id}', [CustomerController::class, 'delete']);

    // Order
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/add-order', [OrderController::class, 'create']);
    Route::post('/store-order', [OrderController::class, 'store']);
    Route::get('/edit-order/{id}', [OrderController::class, 'edit']);
    Route::put('/update-order/{id}', [OrderController::class, 'update']);
    Route::get('/delete-order/{id}', [OrderController::class, 'delete']);
});

Route::middleware('isCashier')->group(function () {
    Route::get('/cashier', [CashierController::class, 'index']);
    Route::get('/cash', [CashierController::class, 'cash']);
    Route::get('/installment', [CashierController::class, 'installment']);
    // cash
    Route::get('/order-confirm/{id}', [CashierController::class, 'confirm']);
    Route::post('/payment-confirm', [CashPaymentController::class, 'payment']);

    //installment 
    Route::get('/install-order/{id}', [InstallmentController::class, 'payment']);
    Route::post('/install-payment', [InstallmentController::class, 'install_confirm']);
    Route::get('/installment-transaction', [InstallmentController::class, 'insta_transac']);
    Route::get('/update-balance/{id}', [InstallmentController::class, 'update_balance']);
    Route::put('/update-payment-balance/{id}', [InstallmentController::class, 'update_payment_balance']);
    Route::get('/paid-installment', [InstallmentController::class, 'paid_installment']);
    //transaction
    Route::get('/cash-transaction', [CashPaymentController::class, 'transaction']);

    Route::get('/profile-cashier', [App\Http\Controllers\HomeController::class, 'cashier_profile']);
});
