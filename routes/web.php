<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\InventarisController;

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
Route::post('/store-inventory', 'App\Http\Controllers\InventarisController@store')->name('storeInventory');
Route::get('/getKlasifikasi/{nama_barang}', 'App\Http\Controllers\BarangController@getKlasifikasi');
Route::post('/simpan-inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
