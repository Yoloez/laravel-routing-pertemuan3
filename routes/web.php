<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Oddy;

Route::get('/', [PostController::class, 'index']);

Route::get('/about', [PostController::class, 'name']);

Route::get('/image', [Oddy::class, 'index']);


// Route::resource('buku', BukuController::class);
Route::get('/terbaru', [BukuController::class, 'terbaru']);

Route::get('/buku', [BukuController::class, 'index']);

Route::get('/buku/create', [BukuController::class, 'create']) -> name('buku.create');
Route::post('/buku', [BukuController::class, 'store']) -> name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy']) -> name('buku.destroy');



Route::get('/buku/{id}/edit', [BukuController::class, 'edit']) -> name('buku.edit');




