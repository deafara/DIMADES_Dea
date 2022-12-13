<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\FoodProductController;
use App\Http\Controllers\Admin\ItemProductController;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --ROUTE PENGUNJUNG--
Route::get('/', function(){
    return view('welcome');
});

// --ROUTE DASHBOARD--
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('admin/mitra', MitraController::class)->middleware('auth')->names('mitra');
Route::resource('admin/kategori', KategoriController::class)->middleware('auth')->names('kategori');
Route::resource('admin/food', FoodProductController::class)->middleware('auth')->names('food');
Route::resource('admin/item', ItemProductController::class)->middleware('auth')->names('item');