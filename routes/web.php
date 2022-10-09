<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TransaksiController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Data Surat';
        return view('dashboard', compact('title'));
    })->name('dashboard');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('arsip', ArsipController::class);

    //route golongan
    Route::resource('golongan', GolonganController::class);

    //route jabatan
    Route::resource('jabatan', JabatanController::class);

    //route persetujuan
    Route::resource('persetujuan', PersetujuanController::class);

    //pegawai
    Route::resource('pegawai', PegawaiController::class);

    //templates
    Route::resource('templates', TemplateController::class);

    //transaksi
    Route::resource('transactions', TransaksiController::class);
});
