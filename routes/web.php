<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\listingController;
use App\Http\Controllers\ReviewController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [listingController::class, 'index' ]);

Route::get('/register', [userController::class, 'register']);

Route::post('/register',[userController::class, 'store']);

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/login', [AuthController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/supplierDashboard', [DashboardController::class, 'supplierDashboard'])->name('supplierDashboard');
    Route::get('/supplierDashboard/create', [DashboardController::class, 'create' ]);
    Route::post('/supplierDashboard',[listingController::class, 'store'])->name('storeProduct');
    Route::get('/supplierDashboard/{listing}',[DashboardController::class, 'edit']);
    Route::put('/supplierDashboard/{listing}/edit', [DashboardController::class, 'update'])->name('listings.update');
    Route::get('/farmerDashboard', [DashboardController::class, 'farmerDashboard'])->name('farmerDashboard');
    Route::get('/farmerDashboard/showCart', [cartController::class, 'show'])->name('showCart');
    Route::delete('/orders/{order}', [cartController::class, 'destroy'])->name('orders.destroy');
    Route::patch('/orders/{order}/mark-as-paid', [cartController::class, 'markAsPaid'])->name('orders.markAsPaid');
    Route::get('/farmerDashboard/{listing}',[DashboardController::class, 'show']);
    Route::post('/farmerDashboard/addtoCart', [cartController::class, 'add'])->name('addtoCart');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');    
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    // Other authenticated routes
    
});

Route::get('/listings/{listing}/edit', [listingController::class, 'edit']);

Route::get('/listings/{listing}',[listingController::class, 'show']);