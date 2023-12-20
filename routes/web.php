<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TestsEnrollmentController;
use App\Http\Controllers\AvailableCoffeeController;
use App\Http\Controllers\BoughtCoffeeController;
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
Route::get('/', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/dashboard', [AuthController::class, 'login'])->name('dashboard');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('coffees', CoffeeController::class);
    Route::post('coffees/{coffee}/buy', [CoffeeController::class, 'buy'])->name('coffees.buy');
    Route::get('/available-coffees', [AvailableCoffeeController::class, 'index'])->name('available-coffees.index');
    Route::get('/bought-coffees', [BoughtCoffeeController::class, 'index'])->name('coffees.bought');
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});

// Route::get('/sendmail', [EmailController::class, 'sendMail']);

Route::get('/send-testenrollment', [TestsEnrollmentController::class, 'sendTestNotification']);

Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
