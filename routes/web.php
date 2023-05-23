<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth', 'checkrole:admin'])->prefix('admin')->group(function() {
    Route::resource('penyakit', App\Http\Controllers\Admin\PenyakitController::class);
    Route::resource('gejala', App\Http\Controllers\Admin\GejalaController::class);
    Route::resource('basis_pengetahuan', App\Http\Controllers\Admin\BasisPengetahuanController::class);
    Route::resource('riwayat', App\Http\Controllers\Admin\RiwayatDiagnosaController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('komentar', App\Http\Controllers\Admin\KritikSaranController::class);
});

Route::middleware(['auth', 'checkrole:user'])->prefix('user')->group(function() {
    Route::get('/penyakit', [App\Http\Controllers\User\PenyakitController::class, 'index'])->name('user.penyakit.index');
    Route::get('/diagnosa', [App\Http\Controllers\User\DiagnosaController::class, 'index'])->name('user.diagnosa.index');
    Route::post('/diagnosa/check', [App\Http\Controllers\User\DiagnosaController::class, 'dempster_shafer'])->name('user.diagnosa.check');
    Route::get('/diagnosa/hasil/{id}', [App\Http\Controllers\User\DiagnosaController::class, 'hasil'])->name('user.diagnosa.hasil');
    Route::get('/diagnosa/riwayat', [App\Http\Controllers\User\DiagnosaController::class, 'riwayat'])->name('user.diagnosa.riwayat');
    Route::get('/komentar', [App\Http\Controllers\User\KritikSaranController::class, 'index'])->name('user.komentar.index');
    Route::post('/komentar', [App\Http\Controllers\User\KritikSaranController::class, 'store'])->name('user.komentar.store');
});

// public route
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('index');
Route::post('/', [App\Http\Controllers\WelcomeController::class, 'storeKomentar'])->name('storeKomentar');
Route::get('/diagnosa', [App\Http\Controllers\WelcomeController::class, 'diagnosa'])->name('diagnosa');
Route::post('/diagnosa/check', [App\Http\Controllers\WelcomeController::class, 'dempster_shafer'])->name('diagnosa.check');
// Route::post('/diagnosa/check', [App\Http\Controllers\WelcomeControllerDebug::class, 'dempster_shafer'])->name('diagnosa.check');
Route::resource('profile', App\Http\Controllers\ProfileController::class);
Route::resource('dashboard', App\Http\Controllers\Admin\DashboardController::class);
Route::get('/forgot-password', function () {
    return view('auth.forget');
});