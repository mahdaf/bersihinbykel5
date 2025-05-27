<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function () {
    return view('account/register');
})->name('register');

Route::post('register', function () {
    // Proses pendaftaran pengguna baru
})->name('account/register');

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

Route::get('/editcampaign',function (){
    return view('editcampaign');
});

Route::get('/hapuscampaign',function (){
    return view('hapuscampaign');
});

Route::get('/detailcampaign',function (){
    return view('detailcampaign');
});
