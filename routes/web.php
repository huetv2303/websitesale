<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function (){
    return view('admin.dashboard.index');
});

Route::get('/home', function (){
    return view('client.layouts.app');
});

Auth::routes();







//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
