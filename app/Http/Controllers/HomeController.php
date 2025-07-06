<?php

namespace App\Http\Controllers;

use App\Models\CarImage;
use App\Models\User;
use App\Models\Maker;
use App\Models\Model;
use Database\Factories\MakerFactory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        //User::factory()->count(10)->create();

        //User::factory()->has(Car::factory()->count(5), 'favouriteCars')->create();

        return view('home.index');
    }
}
