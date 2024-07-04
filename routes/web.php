<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SessionControl;

//bagian login
Route::get('/', [SessionControl::class, 'login'])->name('login');
Route::post('/fungsiLogin', [SessionControl::class, 'fungsiLogin']);
Route::get('/register', [SessionControl::class, 'register']);
Route::post('/create', [SessionControl::class, 'create']);
Route::middleware(['auth'])->group(function () {
    Route::get('/dataUser', [AdminController::class, 'dataUser'])->name('dataUser');
});



//autentikasi pengawas dan pengurus
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboardAdmin', [AdminController::class, 'dataUser'])->middleware('userAkses:Admin');
    Route::get('/productAdmin', [AdminController::class, 'productDisplay'])->middleware('userAkses:Admin');
    Route::get('/createProductAdmin', [AdminController::class, 'createProductAdmin']);
    Route::post('/storeProductAdmin', [AdminController::class, 'storeProductAdmin']);
    Route::get('/transaksiAdmin', [AdminController::class, 'transaksiAdmin'])->middleware('userAkses:Admin');
    Route::get('/adminTransaksi', [AdminController::class, 'adminTransaksi'])->middleware('userAkses:Admin');
    Route::post('/adminAdd', [AdminController::class, 'adminAdd'])->middleware('userAkses:Admin');
    Route::get('/dataUser', [AdminController::class, 'dataUser'])->middleware('userAkses:Admin');
    Route::get('/detailUser', [AdminController::class, 'detailUser'])->middleware('userAkses:Admin');
    Route::delete('/detailUser/{id}', [AdminController::class, 'deleteUser'])->middleware('userAkses:Admin');
    Route::get('/ubahAdminProduct', [AdminController::class, 'ubahAdminProduct'])->name('ubahAdminProduct');
    Route::put('/productAdmin/{id_item}', 'ProductController@editAdminProduct');
    Route::get('/deleteAdminProduct/{id}', [AdminController::class, 'deleteAdminProduct']);
    Route::get('/deleteAdminTransaksi/{id}', [AdminController::class, 'deleteAdminTransaksi']);
    Route::get('/laporan', [AdminController::class, 'laporan']);

    Route::get('/logout', [SessionControl::class, 'logout']);
});

//anggota
Route::get('/home', [AdminController::class, 'home']);
Route::get('/dashboardPengguna', [PenggunaController::class, 'dashboardPengguna']);
Route::get('/productPengguna', [PenggunaController::class, 'productPengguna']);
Route::get('/transaksiPengguna', [PenggunaController::class, 'transaksiPengguna']);
Route::get('/tambahTransaksi', [PenggunaController::class, 'createTransaksi']);
Route::post('/addTransaksi', [PenggunaController::class, 'storeTransaksi']);
Route::get('/hapus/{id}', [PenggunaController::class, 'destroyPengguna']);

//product
Route::get('/product/{url}', [PenggunaController::class, 'buyProduct']);
Route::post('/saveOrder', 'PenggunaController@saveOrder')->name('saveOrder');
Route::get('/history', [PenggunaController::class, 'history']);




