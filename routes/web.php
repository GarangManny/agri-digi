<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\listingController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [listingController::class, 'index' ]);

Route::get('/register', [userController::class, 'register']);

Route::post('/register',[userController::class, 'store']);

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/login', [AuthController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/supplierDashboard', [DashboardController::class, 'supplierDashboard'])->name('supplierDashboard');
    Route::get('/supplierDashboard/create', [DashboardController::class, 'create' ]);
    Route::post('/supplierDashboard',[listingController::class, 'store'])->name('supplierDashboard');
    Route::get('/supplierDashboard/{listing}',[DashboardController::class, 'edit']);
    Route::get('/farmerDashboard', [DashboardController::class, 'farmerDashboard'])->name('farmerDashboard');
    Route::get('/farmerDashboard/{listing}',[DashboardController::class, 'show']);
    Route::post('/farmerDashboard/addtoCart', [cartController::class, 'add'])->name('addtoCart');    
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    // Other authenticated routes
});

Route::get('/listings/{listing}/edit', [listingController::class, 'edit']);

Route::get('/listings/{listing}',[listingController::class, 'show']);