<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\HomeController;

// Main Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/promosi', [HomeController::class, 'promosi'])->name('promosi');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/hubungi', [HomeController::class, 'hubungi'])->name('hubungi');
Route::get('/akun', [HomeController::class, 'akun'])->name('akun');

// Test route
Route::get('/test', function () {
    return 'Test route works!';
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Test route
    Route::get('/test', function () {
        return 'Admin test route works!';
    });
    
    // Login routes (no middleware for now)
    Route::get('/login', function() {
        return view('admin.auth.login');
    })->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    
    // Authenticated admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        
        // Settings routes
        Route::prefix('settings')->group(function () {
            Route::get('/tampilan', [SettingsController::class, 'tampilan'])->name('admin.settings.tampilan');
            Route::post('/tampilan', [SettingsController::class, 'updateTampilan'])->name('admin.settings.tampilan.update');
        });

        // Games management routes
        Route::prefix('games')->name('admin.games.')->group(function () {
            Route::get('/', [GameController::class, 'index'])->name('index');
            Route::get('/create', [GameController::class, 'create'])->name('create');
            Route::post('/', [GameController::class, 'store'])->name('store');
            Route::get('/{game}/edit', [GameController::class, 'edit'])->name('edit');
            Route::put('/{game}', [GameController::class, 'update'])->name('update');
            Route::delete('/{game}', [GameController::class, 'destroy'])->name('destroy');
            Route::patch('/{game}/toggle-popular', [GameController::class, 'togglePopular'])->name('toggle-popular');
            Route::patch('/{game}/toggle-active', [GameController::class, 'toggleActive'])->name('toggle-active');
            Route::post('/bulk-store', [GameController::class, 'bulkStore'])->name('bulk-store');
        });
    });
    
    // Redirect /admin to login
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
});
