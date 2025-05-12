<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Middleware\AuthAndRoleMiddleware;

Route::middleware([AuthAndRoleMiddleware::class])->group(function () {});

Route::get('/', function () {
    return redirect()->route('login.index');
})->name('home');

Route::prefix('/dashboard')->middleware('auth.role:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('/gejala')->group(function () {
        Route::get('/', [GejalaController::class, 'index'])->name('gejala.index');
        Route::post('/store', [GejalaController::class, 'store'])->name('gejala.store');
        Route::get('/show/{id}', [GejalaController::class, 'show'])->name('gejala.show');
        Route::get('/edit/{id}', [GejalaController::class, 'edit'])->name('gejala.edit');
        Route::put('/update/{id}', [GejalaController::class, 'update'])->name('gejala.update');
        Route::delete('/destroy/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
    });

    Route::prefix('/penyakit')->group(function () {
        Route::get('/', [PenyakitController::class, 'index'])->name('penyakit.index');
        Route::post('/store', [PenyakitController::class, 'store'])->name('penyakit.store');
        Route::get('/show/{id}', [PenyakitController::class, 'show'])->name('penyakit.show');
        Route::get('/edit/{id}', [PenyakitController::class, 'edit'])->name('penyakit.edit');
        Route::put('/update/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
        Route::delete('/destroy/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');
    });
});

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
});
