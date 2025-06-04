<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilCommunityController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Route yang bebas diakses (misal register, login, dll)
Route::get('/reg-role', function () {
    return view('account.reg-role');
})->name('reg-role');

Route::get('/register', function (\Illuminate\Http\Request $request) {
    $role = $request->query('role');
    if (!in_array($role, ['komunitas', 'volunteer'])) {
        abort(404);
    }
    return view('account.register', compact('role'));
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('account.register');

Route::get('/reg-success', function () {
    return view('account.reg-success');
})->name('reg-success');

// Route yang hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
});

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
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/error404',function (){
    return view('halamanerror');
});

Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage');