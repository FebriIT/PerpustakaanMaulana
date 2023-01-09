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
    Route::get('user', [UserController::class,'index'])->name('user.index');
    Route::get('user/{id}/destroy', [UserController::class,'destroy'])->name('user.destroy');
    Route::get('user/create', [UserController::class,'create']);
    Route::post('user/store', [UserController::class,'store'])->name('user.store');
    Route::get('user/{id}/edit', [UserController::class,'edit']);
    Route::post('user/{id}/update', [UserController::class,'update'])->name('user.update');
    // Route::resource('petugas',[], UserController::class);
    // Route::resource('transaksi', TransaksiController::class);
    // Route::resource('buku', BukuController::class);
    Route::get('/buku',[BukuController::class,'index']);
    Route::get('/buku/{id}/edit',[BukuController::class,'edit']);
    Route::post('/buku/{d}/update',[BukuController::class,'update']);
    Route::get('/buku/{id}/delete',[BukuController::class,'destroy']);
    Route::get('/buku/create',[BukuController::class,'create']);
    Route::post('/buku/simpan',[BukuController::class,'store']);

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


    Route::get('/notifikasi/viewall',[NotifikasiController::class,'viewall']);
    Route::get('/marknotif',[NotifikasiController::class,'marknotif']);
    Route::get('/transaksi/{id}',[NotifikasiController::class,'viewnotif']);

    Route::get('/transaksi/{id}/detail',[TransaksiController::class,'detail']);

    Route::get('/anggota/{no_anggota}/detail',[AnggotaController::class,'detail']);
    Route::get('/buku/{id}/detail',[BukuController::class,'detail']);
});




Route::prefix('siswa')->middleware('auth', 'role:siswa')->group(function () {
    Route::get('/transaksi/{id}',[NotifikasiController::class,'viewnotif']);
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.siswa');
    Route::get('/buku',[BukuController::class,'index']);
    Route::resource('transaksi', TransaksiController::class);


    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'update']);



    Route::get('/notifikasi/viewall',[NotifikasiController::class,'viewall']);
    Route::get('/marknotif',[NotifikasiController::class,'marknotif']);

    Route::get('/anggota/{no_anggota}/detail',[AnggotaController::class,'detail']);
    Route::get('/buku/{id}/detail',[BukuController::class,'detail']);

});
Route::prefix('guru')->middleware('auth', 'role:guru')->group(function () {
    Route::get('/transaksi/{id}',[NotifikasiController::class,'viewnotif']);
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.guru');
    Route::get('/buku',[BukuController::class,'index']);
    Route::resource('transaksi', TransaksiController::class);


    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'update']);



    Route::get('/notifikasi/viewall',[NotifikasiController::class,'viewall']);
    Route::get('/marknotif',[NotifikasiController::class,'marknotif']);

    Route::get('/anggota/{no_anggota}/detail',[AnggotaController::class,'detail']);
    Route::get('/buku/{id}/detail',[BukuController::class,'detail']);

});
Route::prefix('kaperpus')->middleware('auth', 'role:kaperpus')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.kaperpus');
    
    Route::get('/buku',[BukuController::class,'index']);
    Route::get('/buku/{id}/edit',[BukuController::class,'edit']);
    Route::post('/buku/{d}/update',[BukuController::class,'update']);
    Route::get('/buku/{id}/delete',[BukuController::class,'destroy']);
    Route::get('/buku/create',[BukuController::class,'create']);
    Route::post('/buku/simpan',[BukuController::class,'store']);

    Route::get('/buku/{id}/detail',[BukuController::class,'detail']);

    Route::post('/buku/peminjaman/store', [BukuController::class,'pinjamstore']);

    Route::get('/transaksi', [TransaksiController::class,'index']);
    Route::get('/transaksi/{id}/update', [TransaksiController::class,'update']);
    Route::get('/transaksi/{id}/destroy', [TransaksiController::class,'destroy']);
    Route::get('/transaksi/create',[TransaksiController::class,'transaksibaru']);

    Route::get('/laporanbuku', [LaporanController::class,'laporanbuku']);
    Route::get('/laporantransaksi', [LaporanController::class,'laporantransaksi']);
    
    Route::post('/laporanbuku/download',[LaporanController::class,'dwbuku'] );
    Route::post('/laporantransaksi/download',[LaporanController::class,'dwtransaksi'] );
});

