<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\CetakData;
use App\Http\Controllers\DataServer;
use App\Http\Controllers\MerkBarang;
use App\Http\Controllers\PerangkatJar;
use App\Http\Controllers\NvrCctv;
use App\Http\Controllers\CctvPemko;
use App\Http\Controllers\CctvPublik;
use App\Http\Controllers\AccessPoint;
use App\Http\Controllers\WifiPublik;
use App\Http\Controllers\PerangkatRusak;
use App\Http\Controllers\Pemeliharaan;
use App\Http\Controllers\Pengadaan;
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

Route::get('/', [Login::class, 'login'])->name('login');
Route::post('login', [Login::class, 'login_action'])->name('login.action');
Route::get('logout', [Login::class, 'logout'])->name('logout');

//route resource

Route::middleware(['auth'])->group(function () {

    Route::get('/cetakdata', function () {
        return view('cetakdata', ['title' => 'Cetak Data PDF']);
    });

    Route::get('dashboard', [Dashboard::class, 'index']);

    Route::resource('/data-merk', MerkBarang::class);
    Route::resource('/data-server', DataServer::class);
    Route::resource('/data-perangkat-jaringan', PerangkatJar::class);
    Route::resource('/data-nvr-cctv', NvrCctv::class);
    Route::resource('/data-cctv-pemko', CctvPemko::class);
    Route::resource('/data-cctv-publik', CctvPublik::class);
    Route::resource('/data-access-point', AccessPoint::class);
    Route::resource('/data-wifi-publik', WifiPublik::class);
    Route::resource('/perangkat-rusak', PerangkatRusak::class);
    Route::resource('/pemeliharaan-perangkat', Pemeliharaan::class);
    Route::resource('/pengadaan-perangkat', Pengadaan::class);

    Route::get('getMerk/{id}', [MerkBarang::class, 'getAPI']);
    Route::post('ubahMerk', [MerkBarang::class, 'update'])->name('merk');

    Route::get('getServer/{id}', [DataServer::class, 'getAPI']);
    Route::post('ubahData', [DataServer::class, 'ubah'])->name('Ubah');
    Route::post('cetakServer', [DataServer::class, 'getPDF'])->name('pdfDS');
    Route::post('viewServer', [DataServer::class, 'viewPrint'])->name('prevServer');

    Route::get('getPerangkat/{id}', [Perangkatjar::class, 'getAPI']);
    Route::post('ubahPerangkat', [Perangkatjar::class, 'ubah'])->name('perangkat');
    Route::post('cetakPJ', [Perangkatjar::class, 'getPDF'])->name('pdfPJ');
    Route::post('viewPJ', [Perangkatjar::class, 'viewPrint'])->name('prevPJ');

    Route::get('getNvr/{id}', [Nvrcctv::class, 'getAPI']);
    Route::post('ubahNvr', [Nvrcctv::class, 'ubah'])->name('nvr');
    Route::post('cetakNvr', [Nvrcctv::class, 'getPDF'])->name('pdfNVR');
    Route::post('viewNvr', [Nvrcctv::class, 'viewPrint'])->name('prevNvr');

    Route::get('getPemko/{id}', [CctvPemko::class, 'getAPI']);
    Route::post('ubahPemko', [CctvPemko::class, 'ubah'])->name('pemko');
    Route::post('cetakPemko', [CctvPemko::class, 'getPDF'])->name('pdfPemko');
    Route::post('viewPemko', [CctvPemko::class, 'viewPrint'])->name('prevPemko');

    Route::get('getPublik/{id}', [CctvPublik::class, 'getAPI']);
    Route::post('ubahPublik', [CctvPublik::class, 'ubah'])->name('publik');
    Route::post('cetakPublik', [CctvPublik::class, 'getPDF'])->name('pdfPublik');
    Route::post('viewPublik', [CctvPublik::class, 'viewPrint'])->name('prevPublik');

    Route::get('getAccessPoint/{id}', [AccessPoint::class, 'getAPI']);
    Route::post('ubahAccessPoint', [AccessPoint::class, 'ubah'])->name('ap');
    Route::post('cetakAccessPoint', [AccessPoint::class, 'getPDF'])->name('pdfAP');
    Route::post('viewAP', [AccessPoint::class, 'viewPrint'])->name('prevAP');

    Route::get('getWifiPublik/{id}', [WifiPublik::class, 'getAPI']);
    Route::post('ubahWifiPublik', [WifiPublik::class, 'ubah'])->name('wifi-publik');
    Route::post('cetakWifiPublik', [WifiPublik::class, 'getPDF'])->name('pdfWifi');
    Route::post('viewWifiPublik', [WifiPublik::class, 'viewPrint'])->name('prevWifi');

    Route::get('getRusak/{id}', [PerangkatRusak::class, 'getAPI']);
    Route::get('getKategori/{kategori}', [PerangkatRusak::class, 'getData']);
    Route::post('ubahRusak', [PerangkatRusak::class, 'update'])->name('rusak');
    Route::post('cetakRusak', [PerangkatRusak::class, 'getPDF'])->name('pdfRusak');
    Route::post('viewRusak', [PerangkatRusak::class, 'viewPrint'])->name('prevRusak');

    Route::get('getPemeliharaan/{id}', [Pemeliharaan::class, 'getAPI']);
    Route::post('ubahPemeliharaan', [Pemeliharaan::class, 'update'])->name('pemeliharaan');
    Route::post('cetakPemeliharaan', [Pemeliharaan::class, 'getPDF'])->name('pdfPemeliharaan');
    Route::post('viewPemeliharaan', [Pemeliharaan::class, 'viewPrint'])->name('prevPemeliharaan');

    Route::get('getPengadaan/{id}', [Pengadaan::class, 'getAPI']);
    Route::post('ubahPengadaan', [Pengadaan::class, 'update'])->name('pengadaan');
    Route::post('cetakPengadaan', [Pengadaan::class, 'getPDF'])->name('pdfPengadaan');
    Route::post('viewPengadaan', [Pengadaan::class, 'viewPrint'])->name('prevPengadaan');
});
