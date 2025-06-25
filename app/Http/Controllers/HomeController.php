<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('home.index');
    }
}
