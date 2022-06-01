<?php

use App\Http\Controllers\{ApiPengumumanController, ApiFakultasController, ApiProdiController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(ApiFakultasController::class)->group(function () {
    Route::get('/fakultas', 'fakultas')->name('indexFakultasAPI');
    Route::get('/df', 'detail')->name('detailFakultasAPI');
    // Route::post('/storeFakultas', 'store')->name('store_fakultas');
    // Route::put('/updateFakultas/{slug}',  'update')->name('update_fakultas');
    // Route::delete('/delete-fakultas/{slug}', 'destroy')->name('destroy_fakultas');
});

Route::controller(ApiPengumumanController::class)->group(function () {
    Route::get('/pengumuman', 'pengumuman')->name('indexPengumumanAPI');
    Route::get('/pengumuman/{data}', 'detail')->name('detailPengumumanAPI');
    // Route::post('/storeFakultas', 'store')->name('store_fakultas');
    // Route::put('/updateFakultas/{slug}',  'update')->name('update_fakultas');
    // Route::delete('/delete-fakultas/{slug}', 'destroy')->name('destroy_fakultas');
});

Route::controller(ApiProdiController::class)->group(function () {
    Route::get('/prodi', 'prodi')->name('indexprodiAPI');
    Route::get('/prodi-fakultas', 'prodi_fakultas')->name('indexprodi_fakultasAPI');
    Route::get('/prodi/{data}', 'detail')->name('detailprodiAPI');
    // Route::post('/storeFakultas', 'store')->name('store_fakultas');
    // Route::put('/updateFakultas/{slug}',  'update')->name('update_fakultas');
    // Route::delete('/delete-fakultas/{slug}', 'destroy')->name('destroy_fakultas');
});
