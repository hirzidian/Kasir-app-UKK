<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('template');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('auth', [AuthController::class, 'authProccess'])->name('authProccess');
});

//jika ingin akses halaman ini login terlebih dahulu
Route::middleware('auth')->group(function() {

    Route::get('logout', [AuthController::class, 'logOut'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.duplicate');    
    
    // Product
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');     
        Route::delete('/delete{id}', [ProductController::class, 'destroy'])->name('destroy');
    });
    
    // User
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');     
        Route::delete('/delete{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Transactions
    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/show', [TransactionController::class, 'show'])->name('show');
        Route::get('/create', [TransactionController::class, 'create'])->name('create');
        Route::post('/create', [TransactionController::class, 'store'])->name('store');
        // Sales
        Route::post('/sale/create', [TransactionController::class, 'storeSales'])->name('sale.store');
        Route::get('/sale/member/{id}', [TransactionController::class, 'updateSales'])->name('sale.member');
        Route::post('/sale/detail-print/{id}', [TransactionController::class, 'printdetailStore'])->name('sale.detail.store');
        Route::get('/sale/detail-print/{id}', [TransactionController::class, 'printDetail'])->name('sale.print');
    });
    
});
