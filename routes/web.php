<?php

use App\Http\Controllers\{AdminController, FakultasController, IndexController, LoginController, LoketController, PengumumanController, PetugasBAAKController, ProdiController, RegisMahasiswaController};
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
*/;

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index')->middleware('guest');
    Route::get('/loket-baak', 'loket_baak')->name('loket_baak')->middleware('guest');
    Route::get('/regis-semester/{loket}', 'regis_semester')->name('regis_semester')->middleware('guest');
    Route::get('/pengumuman', 'pengumuman')->name('pengumuman')->middleware('guest');
    Route::get('/info-pengumuman/{no}', 'lihat_pengumuman')->name('lihat_pengumuman')->middleware('guest');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth', 'index')->name('login')->middleware('guest');
    Route::post('/loginprocess', 'loginprocess')->name('loginprocess')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::controller(RegisMahasiswaController::class)->group(function () {
    Route::post('/storeFormRegistrasi', 'store')->name('store_regis_mahasiswa')->middleware('guest');
    Route::get('/riwayat-registrasi-mahasiswa', 'riwayat_regis')->name('riwayat_regis')->middleware('guest');
});

Route::controller(AdminController::class)->group(function () {
    Route::post('/update-user/{slug}', 'update_user')->name('update_user')->middleware('auth');
    Route::get('/dashboard', 'dashboardAdmin')->name('dashboardAdmin')->middleware('auth');
    Route::get('/dashboard-admin', 'dashboardAdminUser')->name('dashboardAdminUser')->middleware('auth');
    Route::get('/home', 'dashboardAdmin')->name('dashboardAdmin')->middleware('auth');
    Route::get('/myprofile', 'myprofile')->name('myprofile')->middleware('auth');
    Route::get('/admin', 'admin')->name('admin')->middleware('auth');
    Route::get('/tambah-admin', 'tambah_admin')->name('tambah_admin')->middleware('auth');
    Route::get('/edit-admin/{slug}', 'edit_admin')->name('edit_admin')->middleware('auth');
    Route::post('/storeAdmin', 'store_admin')->name('store_admin')->middleware('auth');
    Route::put('/updateAdmin/{slug}',  'update_admin')->name('update_admin')->middleware('auth');
    Route::delete('/delete-admin/{slug}', 'destroy_admin')->name('destroy_admin')->middleware('auth');

    //Pegawai Loket
    Route::get('/pegawai-loket', 'pegawai_loket')->name('pegawai_loket')->middleware('auth');
    Route::get('/tambah-pegawai', 'tambah_pegawai')->name('tambah_pegawai')->middleware('auth');
    Route::post('/storePegawai', 'store_pegawai')->name('store_pegawai')->middleware('auth');
    Route::get('/edit-pegawai/{slug}', 'edit_pegawai')->name('edit_pegawai')->middleware('auth');
    Route::put('/updatePegawai/{slug}',  'update_pegawai')->name('update_pegawai')->middleware('auth');
    Route::delete('/delete-pegawai/{slug}', 'destroy_pegawai')->name('destroy_pegawai')->middleware('auth');

    //Herregistrasi Mahasiswa
    Route::get('/herregis-mahasiswa-new', 'herregistrasi_mahasiswa')->name('herregistrasi_mahasiswa_admin')->middleware('auth');
    Route::get('/lihat-regis-admin/{slug}', 'herregistrasi_mahasiswa_baru')->name('herregistrasi_mahasiswa_baru_admin')->middleware('auth');
    Route::delete('/delete-regis-mahasiswa/{slug}', 'destroy_regis')->name('destroy_regis')->middleware('auth');
});

Route::controller(PetugasBAAKController::class)->group(function () {
    Route::get('/dashboard-pegawai-baak', 'dashboardPegawaiBAAK')->name('dashboardPegawaiBAAK')->middleware('auth');
    Route::get('/profil-pegawai', 'profil_pegawai')->name('profil_pegawai')->middleware('auth');
    Route::get('/herregistrasi-mahasiswa', 'herregistrasi_mahasiswa')->name('herregistrasi_mahasiswa')->middleware('auth');
    Route::get('/herregistrasi-sudah-diinput', 'sudah_diinput')->name('sudah_diinput')->middleware('auth');
    Route::get('/lihat-regis/{slug}', 'lihat_regis_mahasiswa')->name('lihat_regis_mahasiswa')->middleware('auth');
    Route::get('/lihat-herregistrasi/{slug}', 'lihat_herregistrasi_mahasiswa')->name('lihat_herregistrasi_mahasiswa')->middleware('auth'); //sudah dilihat
});

Route::controller(FakultasController::class)->group(function () {
    Route::get('/fakultas', 'index')->name('indexFakultas')->middleware('auth');
    Route::get('/tambah-fakultas', 'tambah_fakultas')->name('tambah_fakultas')->middleware('auth');
    Route::post('/storeFakultas', 'store')->name('store_fakultas')->middleware('auth');
    Route::get('/edit-fakultas/{slug}', 'edit_fakultas')->name('edit_fakultas')->middleware('auth');
    Route::put('/updateFakultas/{slug}',  'update')->name('update_fakultas')->middleware('auth');
    Route::delete('/delete-fakultas/{slug}', 'destroy')->name('destroy_fakultas')->middleware('auth');
});


Route::controller(ProdiController::class)->group(function () {
    Route::get('/prodi', 'index')->name('index_prodi')->middleware('auth');
    Route::get('/tambah-prodi', 'tambah_prodi')->name('tambah_prodi')->middleware('auth');
    Route::post('/storeProdi', 'store')->name('store_prodi')->middleware('auth');
    Route::get('/edit-prodi/{slug}', 'edit_prodi')->name('edit_prodi')->middleware('auth');
    Route::put('/updateProdi/{slug}',  'update')->name('update_prodi')->middleware('auth');
    Route::delete('/delete-prodi/{slug}', 'destroy')->name('destroy_prodi')->middleware('auth');
});

Route::controller(LoketController::class)->group(function () {
    Route::get('/loket', 'index')->name('index_loket')->middleware('auth');
    Route::get('/tambah-loket', 'tambah_loket')->name('tambah_loket')->middleware('auth');
    Route::post('/storeLoket', 'store')->name('store_Loket')->middleware('auth');
    Route::get('/edit-loket/{slug}', 'edit')->name('edit_loket')->middleware('auth');
    Route::put('/updateLoket/{slug}',  'update')->name('update_Loket')->middleware('auth');
    Route::delete('/delete-loket/{slug}', 'destroy')->name('destroy_loket')->middleware('auth');
    Route::get('/info-loket/{slug}', 'info')->name('info_loket')->middleware('auth');
    Route::post('/storeProdiLayanan', 'storeProdiLayanan')->name('store_ProdiLayanan')->middleware('auth');
    Route::delete('/delete-prodiLayanan/{slug}', 'destroyPelayanProdiBaak')->name('destroy_PelayanProdiBaak')->middleware('auth');
});


Route::controller(PengumumanController::class)->group(function () {
    Route::get('/announcement', 'index')->name('index_pengumuman')->middleware('auth');
    Route::get('/createSlugPengumuman', 'checkSlug')->name('checkSlug')->middleware('auth');
    Route::get('/tambah-pengumuman', 'tambah')->name('tambah_pengumuman')->middleware('auth');
    Route::post('/storePengumuman', 'store')->name('store_pengumuman')->middleware('auth');
    Route::get('/lihat-pengumuman/{no}', 'detail')->name('detail_pengumuman')->middleware('auth');
    Route::delete('/delete-pengumuman/{slug}', 'destroy')->name('destroy_pengumuman')->middleware('auth');
});
