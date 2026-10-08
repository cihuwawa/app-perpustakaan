<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;

// ==========================================
// ROUTE LOGIN DAN LOGOUT
// ==========================================

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

// Memproses login
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

// Memproses logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==========================================
// ROUTE YANG WAJIB LOGIN
// ==========================================

Route::middleware(['auth'])->group(function () {

    // Halaman utama diarahkan ke daftar buku
    Route::get('/', function () {
        return redirect()->route('books.index');
    });
    // Halaman profil pengguna
    Route::get('/profil', [ProfileController::class, 'show'])
    ->name('profile.show');
    // CRUD Buku
    Route::resource('books', BookController::class);

    // Memproses perubahan password pengguna
    Route::post('/profil/ganti-password', [ProfileController::class, 'updatePassword'])
    ->name('profile.password.update');

    // CRUD Kategori
   // CRUD Kategori hanya untuk admin
    Route::middleware(['admin'])->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show']);
    });
    // CRUD Anggota
    Route::resource('members', MemberController::class);

    // CRUD Peminjaman
    Route::resource('loans', LoanController::class);

    // Pengembalian buku
    Route::put('/loans/{id}/kembalikan',
        [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');

    // Route tambahan dari Pertemuan 7
    Route::prefix('admin')->group(function () {

        Route::get('/info', function () {
            return 'Halaman Admin Perpustakaan';
        });

    });

});
