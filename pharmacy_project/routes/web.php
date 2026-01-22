<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfPerscriptionsController;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/pdfs/{pdfPerscriptions}', [PdfPerscriptionsController::class, 'index'])->name('pdfs.index');
    Route::post('/pdfs/{pdfPerscriptions}', [PdfPerscriptionsController::class, 'store'])->name('pdfs.store');
    Route::get('/pdfs/{pdfPerscriptions}', [PdfPerscriptionsController::class, 'create'])->name('pdfs.create');
    Route::get('/pdfs/{pdfPerscriptions}', [PdfPerscriptionsController::class, 'edit'])->name('pdfs.edit');
    Route::put('/pdfs/{pdfPerscriptions}', [PdfPerscriptionsController::class, 'update'])->name('pdfs.update');
    Route::delete('/pdfs/{pdfPerscriptions}', [PdfPerscriptionsController::class, 'destroy'])->name('pdfs.destroy');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
