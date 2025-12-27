<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [AdminController::class, 'home']);

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/halaman_tambah_kamar', [AdminController::class, 'halaman_tambah_kamar']);

Route::post('/tambah_kamar', [AdminController::class, 'tambah_kamar']);

Route::get('/data_kamar', [AdminController::class, 'data_kamar']);

Route::get('/halaman_update_kamar/{id}', [AdminController::class, 'halaman_update_kamar']);

Route::post('/update_kamar/{id}', [AdminController::class, 'update_kamar']);

Route::get('/delete_kamar/{id}', [AdminController::class, 'delete_kamar']);

Route::get('/detail_kamar/{id}', [HomeController::class, 'detail_kamar']);

Route::post('/booking_kamar/{id}', [HomeController::class, 'booking_kamar']);

Route::get('/data_booking_kamar', [AdminController::class, 'data_booking_kamar']);

Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);

Route::get('/halaman_update_booking/{id}', [AdminController::class, 'halaman_update_booking']);

Route::post('/update_booking/{id}', [AdminController::class, 'update_booking']);

Route::get('/invoice', [HomeController::class, 'listInvoices'])->name('invoice.list');

Route::get('/invoice/{id}', [HomeController::class, 'invoice'])->name('invoice.show');
