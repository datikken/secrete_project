<?php

use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/floppy', [GamesController::class, 'floppy'])->name('floppy');
Route::get('/solitaire', [GamesController::class, 'solitaire'])->name('solitaire');
Route::get('/chess', [GamesController::class, 'chess'])->name('chess');
Route::get('/shooter', [GamesController::class, 'shooter'])->name('shooter');
Route::get('/cattrap', [GamesController::class, 'cattrap'])->name('cattrap');

Route::get('/platformer', function () {
    return view('games.platformer.platformer');
});

Route::get('/office_save_to_txt', [OfficeController::class,'save_to_txt']);
Route::get('/display_files', [FilesController::class,'display_files']);

Route::get('send-mail', [ContactController::class, 'sendDemoMail']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
