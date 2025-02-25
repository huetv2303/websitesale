<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function (){
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/home', function (){
    return view('client.layouts.app');
});

Auth::routes();

Route::resource('roles', RoleController::Class);
Route::resource('users', UserController::Class);
Route::resource('categories', CategoryController::Class);







//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
