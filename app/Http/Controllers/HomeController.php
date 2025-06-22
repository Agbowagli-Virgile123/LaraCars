<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

       //$car = Car::find(1);

       $car = Car::where('id', 1)->with(['features', 'primaryImage'])->get();


       dd($car);


        return view('home.index');
    }
}
