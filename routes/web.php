<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilCommunityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function () {
    return view('account/register');
})->name('register');

Route::post('register', function () {
    return redirect()->route('register3');
})->name('account/register');

Route::get('register2', function () {
    return view('account.register2');
})->name('register2');

Route::get('register3', function () {
    return view('account.register3');
})->name('register3');

Route::get('password-reset', function () {
    return view('account/password-reset');
})->name('password.request');

Route::get('/check-email', function () {
    return view('account/check-email');
});

Route::get('change-password', function () {
    return view('account/change-password');
})->name('password.reset');


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

Route::get('/profil',function (){
    return view('profilvolunteer');
});

Route::get('/profilcommunity', [ProfilCommunityController::class, 'show'])->name('profilcommunity');

Route::get('/campaign/tambah', function () {
    return view('components.TambahCampaign');
})->name('campaign.tambah');


Route::get('/editcampaign',function (){
    return view('editcampaign');
});

Route::get('/hapuscampaign',function (){
    return view('hapuscampaign');
});

Route::get('/detailcampaigncom',function (){
    return view('detailcampaigncom');
});

Route::get('/detailcampaignvol',function (){
    return view('detailcampaignvol');
});

Route::get('/detailcampaign',function (){
    return view('detailcampaign');
});

Route::get('/pendaftaran',function (){
    return view('pendaftaran-campaign');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/allterdaftar', [DashboardController::class, 'allTerdaftar'])->name('allterdaftar');

Route::get('/allrekomendasi', [DashboardController::class, 'allRekomendasi'])->name('allrekomendasi');

Route::get('/error404',function (){
    return view('halamanerror');
});
