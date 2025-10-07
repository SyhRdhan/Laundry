<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ProfileController;
// PERBAIKAN: Import controller yang menangani proses login/logout
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Service;

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

// Rute utama sekarang menampilkan landing page
Route::get('/', function () {
    $services = Service::all();
    return view('welcome', compact('services'));
})->name('welcome');

// -- AWAL GRUP RUTE ADMIN --
Route::middleware(['auth:web'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        // PERBAIKAN: Mengarahkan ke view admin.dashboard, bukan dashboard biasa
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', AdminOrderController::class);
});
// -- AKHIR GRUP RUTE ADMIN --

// Rute untuk Pelanggan (Contoh)
Route::middleware(['auth:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    // PERBAIKAN: Menambahkan rute logout untuk customer di sini
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('customer.logout');
});

// Rute Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';