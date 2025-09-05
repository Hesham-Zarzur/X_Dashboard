<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;



use App\Http\Controllers\Cashier\DashboardController as CashierDashboardController;


Route::get('/', fn() => view('index'))->middleware(['auth', 'verified'])->name('index');

Route::get('/test', function () {
    return view('tailwind-test');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // users
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('list');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/', [AdminUserController::class, 'store'])->name('store');
        Route::get('/{user:code}/profile', [AdminUserController::class, 'show'])->name('show');
        Route::get('/{user:code}/edit', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('/', [AdminUserController::class, 'update'])->name('update');
        Route::delete('/', [AdminUserController::class, 'destroy'])->name('destroy');
    });

});
    


// cashier
Route::middleware(['auth', 'role:cashier'])->prefix('cashier')->group(function () {
    Route::get('/dashboard', [CashierDashboardController::class, 'index'])->name('cashier.dashboard');
});