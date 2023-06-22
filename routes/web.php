<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerPost'])->name('register');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/branches', [\App\Http\Controllers\BranchController::class, 'index'])->name('branches');

Route::middleware(\App\Http\Middleware\AuthCheck::class)->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/history/{booking}', [\App\Http\Controllers\HistoryController::class, 'index'])->name('history');
    Route::get('/bookings-history', [\App\Http\Controllers\HistoryController::class, 'showBookings'])->name('history.list');
    Route::get('/bookings', [\App\Http\Controllers\BookingController::class, 'index'])->name('bookings');
    Route::get('/cards', [\App\Http\Controllers\CardController::class, 'index'])->name('cards');

    Route::post('/cards', [\App\Http\Controllers\CardController::class, 'store'])->name('cards.store');
    Route::get('/cards/{card}/delete', [\App\Http\Controllers\CardController::class, 'destroy'])->name('cards.destroy');

    Route::post('/bookings', [\App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');

    Route::middleware(\App\Http\Middleware\AdminCheck::class)->group(function () {
        Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

        Route::patch('/bookings/{booking}/status', [\App\Http\Controllers\BookingController::class, 'updateStatus'])->name('bookings.status.update');

        Route::post('/branches', [\App\Http\Controllers\BranchController::class, 'store'])->name('branches.store');
        Route::get('/branches/{branch}', [\App\Http\Controllers\BranchController::class, 'edit'])->name('branches.edit');
        Route::patch('/branches/{branch}', [\App\Http\Controllers\BranchController::class, 'update'])->name('branches.update');
        Route::get('/branches/{branch}/delete', [\App\Http\Controllers\BranchController::class, 'destroy'])->name('branches.destroy');


        Route::post('/cars', [\App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{car}', [\App\Http\Controllers\CarController::class, 'edit'])->name('cars.edit');
        Route::patch('/cars/{car}', [\App\Http\Controllers\CarController::class, 'update'])->name('cars.update');
        Route::get('/cars/{car}/delete', [\App\Http\Controllers\CarController::class, 'destroy'])->name('cars.destroy');
    });
});

