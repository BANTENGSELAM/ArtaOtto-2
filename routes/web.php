<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

// Public Routes (Fitur 6: Clean Route Structure)
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/brand/{id}', [BrandController::class, 'show'])->name('brands.public.show');

// Halaman Statis (Baru)
Route::get('/about', [ProductController::class, 'about'])->name('pages.about');
Route::get('/customer-service', [ProductController::class, 'customerService'])->name('pages.customer_service');

// Contact Form Email Route (Rate Limited: max 5 per minute per IP)
use App\Http\Controllers\ContactController;
Route::post('/contact/send', [ContactController::class, 'handleContactForm'])
    ->middleware('throttle:5,1')
    ->name('contact.send');

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login')->middleware('guest:admin');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit')->middleware('guest:admin');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Protected Admin Routes (Fitur 1)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Product Management (Resourceful but manual mapping as requested previously)
        Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Brand Management
        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
        Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

        // Admin Management (Fitur Baru: Kelola Akun Admin)
        Route::get('/admins', [\App\Http\Controllers\AdminManagementController::class, 'index'])->name('admins.index');
        Route::get('/admins/create', [\App\Http\Controllers\AdminManagementController::class, 'create'])->name('admins.create');
        Route::post('/admins/store', [\App\Http\Controllers\AdminManagementController::class, 'store'])->name('admins.store');

        // Slider Management Route
        Route::get('/sliders', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('sliders.index');
        Route::post('/sliders', [\App\Http\Controllers\Admin\SliderController::class, 'store'])->name('sliders.store');
        Route::delete('/sliders/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('sliders.destroy');
    });
});
