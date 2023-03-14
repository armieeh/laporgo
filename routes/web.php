<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\TanggapanController;
use App\Models\Masyarakat;

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
Route::get('/', [UserController::class, 'index']);

Route::middleware(['isMasyarakat'])->group(function(){
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
    Route::get('/delete/{id_pengaduan}', [UserController::class, 'destroy'])->name('pekat.delete');
    Route::get('/laporan', [UserController::class, 'laporan'])->name('pekat.laporan');
    Route::get('/profile/{nik}', [UserController::class, 'profile'])->name('pekat.editProfile');
    Route::post('/update/{nik}', [UserController::class, 'updateProfile']);
    Route::get('/edit/{id_pengaduan}', [UserController::class, 'editPengaduan']);
    Route::put('/laporan/{id_pengaduan}', [UserController::class, 'updatePengaduan']);
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');
});

Route::middleware(['guest'])->group(function(){
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');
    Route::get('/register', [UserController::class, 'registerform'])->name('pekat.formRegister');
    Route::get('/login', [UserController::class, 'loginform'])->name('pekat.loginForm');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
});

Route::prefix('admin')->group(function (){

    Route::middleware(['isAdmin'])->group(function(){
        Route::resource('petugas', PetugasController::class);
        Route::resource('masyarakat', MasyarakatController::class);
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });

    Route::middleware(['isPetugas'])->group(function(){
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('pengaduan', PengaduanController::class);
        Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::middleware(['isGuest'])->group(function(){
    });
});

