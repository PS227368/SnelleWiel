<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return view('welcome');
});


// Route voor het weergeven van het uploadformulier
Route::get('/upload', [FileUploadController::class, 'showUploadForm']);

// Route voor het verwerken van het uploaden van het bestand
Route::post('/upload', [FileUploadController::class, 'upload']);

// Route voor het weergeven van de pagina om de gegevens te bekijken
Route::get('/orders', [OrderController::class, 'index']);