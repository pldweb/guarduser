<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AutentikasiController;


Route::get('/dashboard',[App\Http\Controllers\HomeController::class, 'home']);


Route::get('/create', [AutentikasiController::class, 'Autentikasi'])->name('BuatAkun');
Route::post('/saveregister', [AutentikasiController::class, 'saveregistrasi'])->name('saveregistrasi');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']); 
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login']); 
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']); 
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/management', [App\Http\Controllers\ManagementController::class, 'index']);

//Hak akses untuk admin
Route::group(['middleware' => 'admin'], function () {

  Route::view('/ui', 'management.ui');
  Route::view('/ceo', 'management.ceo');
  Route::view('/marketing', 'management.marketing');
  Route::view('/all', 'management.all'); 
  
});

// ini untuk gate tim management
Route::group(['middleware' => 'management'], function () {

  Route::view('/kinerja/pegawai', 'kinerja.pegawai');
  Route::view('/kinerja/security', 'kinerja.security');
  Route::view('/kinerja/sales', 'kinerja.sales');

});

//ini untuk Gate tim user
Route::group(['middleware' => 'user'], function () {

  Route::get('/product/charts', [CrudController::class, 'grafik']);
  Route::get('/product/table', [CrudController::class, 'table']);
  Route::get('/product/table/tambah', [CrudController::class, 'TambahBarang'])->name('tambah.barang');
  Route::post('/product/table/simpan', [CrudController::class, 'SimpanBarang'])->name('simpan');

  Route::delete('/product/table/{id}', [CrudController::class, 'HapusBarang'])->name('hapus');
  Route::get('/product/table/{id}/edit', [CrudController::class, 'EditBarang'])->name('edit');
  Route::patch('/product/table/{id}', [CrudController::class, 'UpdateBarang'])->name('update');

});