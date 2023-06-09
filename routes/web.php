<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookedBookingsController;
use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('services', ServiceController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('bookings', BookingController::class)
->only(['index', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('bookedBookings', BookedBookingsController::class)
->only(['index', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::patch('/clients/{booking}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{booking}', [ClientController::class, 'destroy'])->name('clients.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
