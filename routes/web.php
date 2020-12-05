<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/vignere', [App\Http\Controllers\MessageController::class, 'index'])->name('home');
Route::get('/rot13', [App\Http\Controllers\MessageController::class, 'rot13_view'])->name('rot13_view');
Route::post('/vignere/encrypt', [App\Http\Controllers\MessageController::class, 'vignere_encrypt'])->name('vignere-encrypt');
Route::post('/vignere/decrypt', [App\Http\Controllers\MessageController::class, 'vignere_decrypt'])->name('vignere-decrypt');
Route::post('/rot13/encrypt', [App\Http\Controllers\MessageController::class, 'rot13'])->name('rot13');
