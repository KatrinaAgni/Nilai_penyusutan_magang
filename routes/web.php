<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/template', [App\Http\Controllers\HomeController::class, 'template'])->name('template');

// Route::get('/penerbit/index', [App\Http\Controllers\PenerbitController::class, 'index'])->name('penerbit.index');
// Route::get('/penerbit/create', [App\Http\Controllers\PenerbitController::class, 'create'])->name('penerbit.create');
// Route::post('/penerbit/store', [App\Http\Controllers\PenerbitController::class, 'store'])->name('penerbit.store');
// Route::get('/penerbit/edit/{id}', [App\Http\Controllers\PenerbitController::class, 'edit'])->name('penerbit.edit');
// Route::put('/penerbit/update/{id}', [App\Http\Controllers\PenerbitController::class, 'update'])->name('penerbit.update');
// Route::post('/penerbit/destroy/{id}', [App\Http\Controllers\PenerbitController::class, 'destroy'])->name('penerbit.destroy');

Route::controller(PenerbitController::class)->middleware(['auth'])->
name('penerbit.')->group(function(){
    Route::get('/penerbit', 'index')->name('index');
    Route::get('/penerbit/create', 'create')->name('create');
    Route::post('/penerbit/store', 'store')->name('store');
    Route::get('/penerbit/{id}/edit', 'edit')->name('edit');
    Route::put('/penerbit/{id}', 'update')->name('update');
    Route::post('/penerbit/{id}/delete', 'destroy')->name('destroy');
});

Route::resource('buku', BukuController::class)->middleware('auth');
Route::resource('peminjaman', PeminjamanController::class)->middleware('auth');