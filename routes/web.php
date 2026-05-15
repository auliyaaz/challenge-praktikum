<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

//halaman utama
Route::get('/', [ProductController::class, 'index'])->name('home');

//halman login 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

//Proses form Login & Logout 
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

//
Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::post('/product', [ProductController::class, 'store'])->name('products.store');


