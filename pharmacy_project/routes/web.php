<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfPerscriptionsController;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/pdfs', [PdfPerscriptionsController::class, 'index'])->name('pdfs.index');
    Route::post('/pdfs', [PdfPerscriptionsController::class, 'store'])->name('pdfs.store');
    Route::get('/pdfs/create', [PdfPerscriptionsController::class, 'create'])->name('pdfs.create');
    Route::get('/pdfs', [PdfPerscriptionsController::class, 'edit'])->name('pdfs.edit');
    Route::put('/pdfs', [PdfPerscriptionsController::class, 'update'])->name('pdfs.update');
    Route::delete('/pdfs', [PdfPerscriptionsController::class, 'destroy'])->name('pdfs.destroy');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
