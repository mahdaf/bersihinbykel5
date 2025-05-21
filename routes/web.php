<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detail-campaign',function (){
    return view('detailcampaign');
});

Route::get('/profil',function (){
    return view('profil');
});

Route::get('/edit-campaign', function () {
    return view('editcampaign');
});

Route::get('/hapus-campaign', function () {
    return view('hapuscampaign');
});
