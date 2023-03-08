<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FruitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('fruits.index');
});

Route::get('/fruits', [FruitController::class, 'index'])->name('fruits.index');
Route::get('/fruits/filter', [FruitController::class, 'filter'])->name('fruits.filter');
Route::get('/fruits/favorites', [FruitController::class, 'favorites'])->name('fruits.favorites');
Route::post('/fruits/{fruit}/favorite', [FruitController::class, 'favorite'])->name('fruits.favorite');
Route::delete('/fruits/{fruit}/favorite', [FruitController::class, 'unfavorite'])->name('fruits.unfavorite');