<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;


Route::get('/', [UploadController::class, 'showUploadForm'])->name('upload.form');
Route::get('/upload-form', [UploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload.submit');
