<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceiptController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// In routes/web.php
Route::get('/help', function () {
    return view('help');
})->name('help'); // Optional: naming the route

Route::get('/about', function () {
    return view('about');
})->name('about'); // Optional: naming the route

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/receipt/generate', [ReceiptController::class, 'generate'])->name('receipt.generate');
Route::post('/receipt', [ReceiptController::class, 'store'])->name('receipt.store');
require __DIR__.'/auth.php';
