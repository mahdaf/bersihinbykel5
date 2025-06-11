<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilCommunityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PartisipanCampaignController;

Route::get('/', function () {
    return view('landingpage');
});

// Route yang bebas diakses
Route::get('/register', function (\Illuminate\Http\Request $request) {
    $role = $request->query('role');
    if (!in_array($role, ['komunitas', 'volunteer'])) {
        return view('account.reg-role');
    }
    return view('account.register', compact('role'));
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('account.register');

Route::get('/reg-success', function () {
    return view('account.reg-success');
})->name('reg-success');

Route::get('/login', function () {
    return view('account/login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('password-reset', function () {
    return view('account/password-reset');
})->name('password.request');

Route::post('password-reset', [ForgotPasswordController::class, 'checkEmail'])->name('password.reset.check');
Route::get('change-password', [ForgotPasswordController::class, 'showChangePasswordForm'])->name('password.reset.form');
Route::post('change-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'updatePassword'])->name('password.update');

// Route yang hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/profil', function () {
        return view('profilvolunteer');
    });
    Route::get('/campaign/tambah', function () {
        return view('components.TambahCampaign');
    })->name('campaign.tambah');
    // ...tambahkan semua route lain yang ingin dibatasi login di sini...
    Route::get('/editcampaign', function () {
        return view('editcampaign');
    });
    Route::get('/hapuscampaign', function () {
        return view('hapuscampaign');
    });
    Route::get('/detailcampaigncom', function () {
        return view('detailcampaigncom');
    });
    Route::get('/detailcampaignvol', function () {
        return view('detailcampaignvol');
    });
    Route::get('/detailcampaign', function () {
        return view('detailcampaign');
    });
    Route::get('/pendaftaran', function () {
        return view('pendaftaran-campaign');
    });
    Route::get('/allterdaftar', [DashboardController::class, 'allTerdaftar'])->name('allterdaftar');
    Route::get('/allrekomendasi', [DashboardController::class, 'allRekomendasi'])->name('allrekomendasi');
    Route::get('/profilcommunity', [ProfilCommunityController::class, 'show'])->name('profilcommunity');
    Route::get('/campaign/{id}', [CampaignController::class, 'show']);
    Route::get('/campaign/{id}/daftar', [PartisipanCampaignController::class, 'create'])->name('partisipan.create');
    Route::post('/campaign/{id}/daftar', [PartisipanCampaignController::class, 'store'])->name('partisipan.store');
});

// Route::get('/profil',function (){
//     return view('profilvolunteer');
// });

// Route::get('/profilcommunity', [ProfilCommunityController::class, 'show'])->name('profilcommunity');

// Route::get('/detailcampaigncom',function (){
//     return view('detailcampaigncom');
// });

// Route::get('/detailcampaignvol',function (){
//     return view('detailcampaignvol');
// });

// Route::get('/detailcampaign',function (){
//     return view('detailcampaign');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/allterdaftar', [DashboardController::class, 'allTerdaftar'])->name('allterdaftar');

// Route::get('/allrekomendasi', [DashboardController::class, 'allRekomendasi'])->name('allrekomendasi');

Route::get('/error404',function (){
    return view('halamanerror');
});
