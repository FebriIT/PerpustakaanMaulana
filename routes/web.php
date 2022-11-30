<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Transaksi;

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

Route::get('/laporan', function () {
    return view('laporan.lapanggota');
});

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');



Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::resource('buku', BukuController::class);
    Route::get('anggota', [UserController::class,'index'])->name('anggota.index');
    Route::get('anggota/{id}/destroy', [UserController::class,'destroy'])->name('anggota.destroy');
    Route::get('anggota/create', [UserController::class,'create']);
    Route::post('anggota/store', [UserController::class,'store'])->name('user.store');
    Route::get('anggota/{id}/edit', [UserController::class,'edit']);
    Route::post('anggota/{id}/update', [UserController::class,'update'])->name('user.update');
    // Route::resource('petugas',[], UserController::class);
    // Route::resource('transaksi', TransaksiController::class);

    Route::get('/transaksi', [TransaksiController::class,'index']);
    Route::get('/transaksi/{id}/update', [TransaksiController::class,'update']);
    Route::get('/transaksi/{id}/destroy', [TransaksiController::class,'destroy']);
    Route::get('/transaksi/create',[TransaksiController::class,'transaksibaru']);



    Route::get('/buku/{id}/pinjam',[BukuController::class,'pinjam']);
    Route::post('/buku/peminjaman/store', [BukuController::class,'pinjamstore']);

    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'update']);

    Route::get('/laporananggota', [LaporanController::class,'laporananggota']);
    Route::get('/laporanbuku', [LaporanController::class,'laporanbuku']);
    Route::get('/laporantransaksi', [LaporanController::class,'laporantransaksi']);
    Route::post('/laporananggota/download',[LaporanController::class,'dwanggota'] );
    Route::post('/laporanbuku/download',[LaporanController::class,'dwbuku'] );
    Route::post('/laporantransaksi/download',[LaporanController::class,'dwtransaksi'] );

    // Route::get('/kategori',[KategoriController::class,'index']);
    // Route::get('/kategori/create',[KategoriController::class,'create']);
    // Route::post('/kategori/store',[KategoriController::class,'store'])->name('kategori.store');
    // Route::get('/kategori/{id}/destroy',[KategoriController::class,'destroy'])->name('kategori.destroy');
    // Route::get('/kategori/{id}/edit',[KategoriController::class,'edit']);
    // Route::put('/kategori/{id}/update',[KategoriController::class,'update'])->name('kategori.update');
    // Route::post('/peminjaman/store',[BukuController::class,'pinjamstore'])->name('peminjaman.store');


    Route::get('/notifikasi/viewall',[NotifikasiController::class,'viewall']);
    Route::get('/marknotif',[NotifikasiController::class,'marknotif']);
    Route::get('/transaksi/{id}',[NotifikasiController::class,'viewnotif']);

    Route::get('/transaksi/{id}/detail',[TransaksiController::class,'detail']);

    Route::get('/anggota/{no_anggota}/detail',[AnggotaController::class,'detail']);
    Route::get('/buku/{id}/detail',[BukuController::class,'detail']);
});




Route::prefix('user')->middleware('auth', 'role:user')->group(function () {
    Route::get('/transaksi/{id}',[NotifikasiController::class,'viewnotif']);
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.user');
    Route::get('/buku',[BukuController::class,'index']);
    Route::resource('transaksi', TransaksiController::class);


    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'update']);



    Route::get('/notifikasi/viewall',[NotifikasiController::class,'viewall']);
    Route::get('/marknotif',[NotifikasiController::class,'marknotif']);

    Route::get('/anggota/{no_anggota}/detail',[AnggotaController::class,'detail']);
    Route::get('/buku/{id}/detail',[BukuController::class,'detail']);

    //  Route::get('/laporananggota', [LaporanController::class,'laporananggota']);
    // Route::get('/laporanbuku', [LaporanController::class,'laporanbuku']);
    // Route::get('/laporantransaksi', [LaporanController::class,'laporantransaksi']);
    // Route::post('/laporananggota/download',[LaporanController::class,'dwanggota'] );
    // Route::post('/laporanbuku/download',[LaporanController::class,'dwbuku'] );
    // Route::post('/laporantransaksi/download',[LaporanController::class,'dwtransaksi'] );
});