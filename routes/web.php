<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

//Home Route
Route::get('/',[HomeController::class, 'index']);

//Signup Routes
Route::get('/signup',[SignupController::class, 'create'] );

//Login Routes
Route::get('/login', [LoginController::class, 'create']);