<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\Model;
use Database\Factories\MakerFactory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $maker = Maker::factory()->count(10)->hasModels(5)->create();
       
        //dd($maker);

        return view('home.index');
    }
}
