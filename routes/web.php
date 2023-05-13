<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\RiwayatKendaraanController;
use App\Models\Kendaraan;

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

Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class,'index']);

    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('penyewaan', PenyewaanController::class);
    Route::resource('persetujuan', PersetujuanController::class);


    Route::resource('riwayat_kendaraan', RiwayatKendaraanController::class);
    
    Route::post('/kendaraan/getEditForm',[KendaraanController::class,'getEditForm'])->name('kendaraan.getEditForm');
    Route::post('/penyewaan/getEditForm',[PenyewaanController::class,'getEditForm'])->name('penyewaan.getEditForm');
    Route::post('/driver/getEditForm',[DriverController::class,'getEditForm'])->name('driver.getEditForm');
    Route::post('/persetujuan/change_status',[PersetujuanController::class,'changeStatus'])->name('persetujuan.changeStatus');

});

Auth::routes();


Route::get('/home',[HomeController::class,'index'])->name('home');
