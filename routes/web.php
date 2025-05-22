<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function () {
    return view('account/register');
})->name('register');

// Ubah route POST register agar redirect ke register3
Route::post('register', function () {
    // Simulasi proses pendaftaran pengguna baru
    return redirect()->route('register3');
})->name('account/register');

// Route untuk halaman register2
Route::get('register2', function () {
    return view('account.register2');
})->name('register2');

// Route untuk halaman register3 (pendaftaran berhasil)
Route::get('register3', function () {
    return view('account.register3');
})->name('register3');

Route::get('password-reset', function () {
    // halaman reset password
    return view('account/password-reset');
})->name('password.request');

Route::get('/login', function () {
    return view('account/login');
})->name('login');

Route::post('/login', function () {
    // Proses autentikasi login
})->name('login');

Route::get('/dashboard',function (){
    return view('dashboard');
});

Route::get('/profil',function (){
    return view('profil');
});

Route::get('/campaign/tambah', function () {
    return view('components.TambahCampaign');
})->name('campaign.tambah');

