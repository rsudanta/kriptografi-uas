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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\MessageController::class, 'index'])->name('home');
Route::post('/home/store/vignere', [App\Http\Controllers\MessageController::class, 'store'])->name('store');
Route::get('/home/decode/{id}', [App\Http\Controllers\MessageController::class, 'show'])->name('show');
Route::post('/home/decode/run/{id}', [App\Http\Controllers\MessageController::class, 'decode'])->name('decode');
Route::post('/home/store/rot13', [App\Http\Controllers\MessageController::class, 'rot13'])->name('rot13');
