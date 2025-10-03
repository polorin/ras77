<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\MemberAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankAccountController;

// Main Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/promosi', [HomeController::class, 'promosi'])->name('promosi');
Route::get('/login', [HomeController::class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [HomeController::class, 'register'])->middleware('guest')->name('register');
Route::get('/hubungi', [HomeController::class, 'hubungi'])->name('hubungi');
Route::get('/akun', [HomeController::class, 'akun'])->middleware('auth')->name('akun');
Route::get('/ubah-kata-sandi', [HomeController::class, 'ubahKataSandi'])->middleware('auth')->name('ubah-kata-sandi');
Route::get('/deposit', [HomeController::class, 'deposit'])->middleware('auth')->name('deposit');
Route::middleware(['auth', 'prevent-back-history'])->get('/member/home', [HomeController::class, 'memberHome'])->name('member.home');
Route::post('/register', [MemberAuthController::class, 'register'])->middleware('guest')->name('register.submit');
Route::post('/login', [MemberAuthController::class, 'login'])->middleware('guest')->name('login.submit');
Route::post('/logout', [MemberAuthController::class, 'logout'])->middleware('auth')->name('logout');

// Bank Account Routes (User)
Route::middleware('auth')->prefix('bank-accounts')->name('bank-accounts.')->group(function () {
    Route::get('/', [BankAccountController::class, 'index'])->name('index');
    Route::post('/', [BankAccountController::class, 'store'])->name('store');
    Route::put('/{id}', [BankAccountController::class, 'update'])->name('update');
    Route::delete('/{id}', [BankAccountController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/set-primary', [BankAccountController::class, 'setPrimary'])->name('set-primary');
});

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
            Route::get('/umum', [SettingsController::class, 'umum'])->name('admin.settings.umum');
            Route::post('/umum', [SettingsController::class, 'updateUmum'])->name('admin.settings.umum.update');
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

        Route::resource('promosi', PromotionController::class)
            ->except(['show'])
            ->names('admin.promosi');

        // User management routes
        Route::resource('users', UserController::class)
            ->names('admin.users');

        // Bank Account management routes
        Route::prefix('bank-accounts')->name('admin.bank-accounts.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\BankAccountController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\BankAccountController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\BankAccountController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\BankAccountController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\Admin\BankAccountController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\BankAccountController::class, 'destroy'])->name('destroy');
            Route::patch('/{id}/toggle-active', [\App\Http\Controllers\Admin\BankAccountController::class, 'toggleActive'])->name('toggle-active');
        });
    });
    
    // Redirect /admin to login
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
});
