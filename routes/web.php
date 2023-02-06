<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataServer;
use App\Http\Controllers\PerangkatJar;
use App\Http\Controllers\NvrCctv;
use App\Http\Controllers\CctvPemko;
use App\Http\Controllers\AccessPoint;
use App\Http\Controllers\Login;

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
    return view('login');
});

Route::get('login', [Login::class, 'login'])->name('login');
Route::post('login', [Login::class, 'login_action'])->name('login.action');
Route::get('logout', [Login::class, 'logout'])->name('logout');

//route resource

Route::middleware(['auth'])->group(function () {
    
    // Route::get('/dashboard', function () {
    //     return view('dashboard', ['title' => 'Dashboard']);
    // });

    Route::get('dashboard', [Dashboard::class, 'index']);

    Route::resource('/data-server', DataServer::class);
    Route::resource('/data-perangkat-jaringan', PerangkatJar::class);
    Route::resource('/data-nvr-cctv', NvrCctv::class);
    Route::resource('/data-cctv-pemko', CctvPemko::class);
    Route::resource('/data-access-point', AccessPoint::class);

    Route::get('getServer/{sn}', [DataServer::class, 'getAPI']);
    Route::post('ubahData', [DataServer::class, 'ubah'])->name('Ubah');
    Route::post('cetakServer', [DataServer::class, 'getPDF'])->name('pdfDS');

    Route::get('getPerangkat/{sn}', [Perangkatjar::class, 'getAPI']);
    Route::post('ubahPerangkat', [Perangkatjar::class, 'ubah'])->name('perangkat');
    Route::post('cetakPJ', [Perangkatjar::class, 'getPDF'])->name('pdfPJ');

    Route::get('getNvr/{sn}', [Nvrcctv::class, 'getAPI']);
    Route::post('ubahNvr', [Nvrcctv::class, 'ubah'])->name('nvr');
    Route::post('cetakNvr', [Nvrcctv::class, 'getPDF'])->name('pdfNVR');

    Route::get('getPemko/{sn}', [CctvPemko::class, 'getAPI']);
    Route::post('ubahPemko', [CctvPemko::class, 'ubah'])->name('pemko');
    Route::post('cetakPemko', [CctvPemko::class, 'getPDF'])->name('pdfPemko');

    Route::get('getAccessPoint/{sn}', [AccessPoint::class, 'getAPI']);
    Route::post('ubahAccessPoint', [AccessPoint::class, 'ubah'])->name('ap');
    Route::post('cetakAccessPoint', [AccessPoint::class, 'getPDF'])->name('pdfAP');
});