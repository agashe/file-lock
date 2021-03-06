<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;

// homepage
Route::get('/', HomeController::class)->name('home');

// files APIs
Route::post('files/encrypt', [FileController::class, 'encrypt'])->name('files.encrypt');
Route::post('files/decrypt', [FileController::class, 'decrypt'])->name('files.decrypt');
