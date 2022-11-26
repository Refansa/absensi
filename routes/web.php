<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'siswa'     => SiswaController::class,
        'absensi'   => AbsensiController::class,
    ]);

    Route::any('/logout', function (Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Auth::logout();

        return redirect()->route('login')->with([
            'alert-content' => 'Logout berhasil!',
            'alert-type'    => 'success',
        ]);
    })->name('logout');
});

/**
 * Route for development purpose.
 */
Route::any('/stub', fn () => 'This route is still a work in progress.')->name('stub');

Route::any('/test', function () {
    $model = Absensi::all();
    $model->load('siswa');

    dd($model);
})->name('test');
