<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

//Home Route
Route::get('/',[HomeController::class, 'index']);

//Signup Routes
Route::get('/signup',[SignupController::class, 'create'])->name('signup');

//Login Routes
Route::get('/login', [LoginController::class, 'create'])->name('login');

//Search Routes
Route::get('/car/search',[CarController::class, 'search'])->name('car.search'); 

//Car Routes
Route::resource('car', CarController::class);
