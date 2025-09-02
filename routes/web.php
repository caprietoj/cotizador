<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

// Ruta principal - formulario de cotización
Route::get('/', [QuoteController::class, 'index'])->name('quote.form');

// Ruta para calcular precio (AJAX)
Route::post('/calculate-price', [QuoteController::class, 'calculatePrice'])->name('quote.calculate');

// Ruta para crear cotización y enviar por correo
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

// Ruta para descargar PDF (opcional)
Route::get('/quote/{id}/pdf', [QuoteController::class, 'downloadPdf'])->name('quote.pdf');
