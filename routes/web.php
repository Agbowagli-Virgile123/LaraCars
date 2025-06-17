<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Home Route
Route::get('/',[HomeController::class, 'index']);

