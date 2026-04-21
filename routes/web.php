<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

Route::get('/admin/bookings', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.bookings');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});

Route::post('/payment/confirm/{booking}', [PaymentController::class, 'confirm'])
    ->name('payment.confirm');
    
Route::get('/payment/confirmation/{booking}', [PaymentController::class, 'confirmation'])
    ->name('payment.confirmation');

Route::get('/payment/bank/{booking}', [PaymentController::class, 'bank'])
    ->name('payment.bank');

Route::post('/payment/process', [App\Http\Controllers\PaymentController::class, 'process'])
    ->name('payment.process');

Route::get('/payment/mtn/{booking}', [App\Http\Controllers\PaymentController::class, 'mtn'])
    ->name('payment.mtn');

Route::get('/payment/airtel/{booking}', [App\Http\Controllers\PaymentController::class, 'airtel'])
    ->name('payment.airtel');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/payments/{booking}', [PaymentController::class, 'show'])->name('payments.show');


Route::post('/bookings/{eventId}', [BookingController::class, 'store'])->name('bookings.store');


Route::post('/events/{event}/book', [BookingController::class, 'store'])
    ->name('bookings.store');

Route::middleware(['auth'])->group(function () {

    Route::resource('events', EventController::class);

    Route::post('/events/{event}/book', [BookingController::class, 'store'])
        ->name('book');

        
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
