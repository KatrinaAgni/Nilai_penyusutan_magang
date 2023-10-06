<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::get('/barangs', [BarangController::class, 'index']);
Route::get('/barangs/create', [BarangController::class, 'create'])->name('createBarang');
Route::post('/barangs/store', [BarangController::class, 'store'])->name('storeBarang');
Route::get('/barangs/{id}/calculate', [BarangController::class, 'calculateDepreciation'])->name('calculateDepreciation');
Route::get('/barangs/{id}/view-process', [BarangController::class, 'viewProcess'])->name('viewProcess');

