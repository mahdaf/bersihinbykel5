<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function () {
    return view('account/register');
})->name('register');

Route::post('register', function () {
})->name('account/register');

Route::get('reset-password', function () {
    return view('account/password-reset');
})->name('password.request');

Route::get('/check-email', function () {
  return view('account/check-email');
});

Route::get('change-password', function () {
    return view('account/change-password');
})->name('password.reset');

Route::get('/login', function () {
    return view('account/login');
})->name('login');

Route::post('/login', function () {
})->name('login');

Route::get('/dashboard',function (){
    return view('dashboard');
});

Route::get('/profil',function (){
    return view('profil');
});
