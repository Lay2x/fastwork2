<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KuponController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Http\Controllers\DaftarKegiatanUserController;
use App\Http\Controllers\SubKategoriKegiatanController;
use App\Http\Controllers\KategoriAnggotaController;
use App\Http\Controllers\HomeWebController;
use App\Http\Controllers\ListPembayaranController;
use App\Http\Controllers\MetodePembayaranController;
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

Route::get('/', [HomeWebController::class, 'index']);

Route::get('invoice/{id}', [DaftarKegiatanController::class, 'invoice'])->name('invoice');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::resource('setting', SettingController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('kupon', KuponController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('order', OrderController::class);
    Route::resource('kategori_kegiatan', KategoriKegiatanController::class);
    Route::resource('sub_kategori_kegiatan', SubKategoriKegiatanController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('daftar_kegiatan', DaftarKegiatanController::class);
    Route::resource('daftar_kegiatan_user', DaftarKegiatanUserController::class);
    Route::resource('kategori_anggota', KategoriAnggotaController::class);
    Route::resource('list_pembayaran', ListPembayaranController::class);
    // Route::get('order/succes', [OrderController::class, 'succes'])->name('order.succes');
    // Route::post('/mistrans-callback', OrderController::class, 'callback');
    Route::resource('metode', MetodePembayaranController::class);
    Route::post('api/fetch-kegiatan', [SubKategoriKegiatanController::class, 'fetchKegiatan']);
});
