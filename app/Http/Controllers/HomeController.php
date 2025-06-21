<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        /** Selecting */
        //Select all cars
        //$cars = Car::all();

        //Select published cars
        //$cars = Car::where('published_at', '!=', null)->get();

        //Select only the first car
        //$cars = Car::first();

        //Select car based on the id
        //$cars = Car::find(1);

        //Sort (asc, desc) car based on the specific column
        //$cars = Car::orderBy('published_at', 'desc')->get();

        //Limit the selection 
        //$cars = Car::limit(2)->get();




        /** Inserting */

        //Method 1
        //$car = new Car();

;       //$car->maker_id = 1;
        //$car->model_id = 2;
        //$car->year = 2023;
        //$car->price = 50000;
        //$car->vin = 123;
        //$car->mileage = 123;
        //$car->car_type_id = 1;
        //$car->fuel_type_id = 2;
        //$car->user_id = 1;
        //$car->city_id = 4;
        //$car->address = "Address 5";
        //$car->phone = "0567891234";
        //$car->description = null;
        //$car->published_at = now();

        //$car->save();

        //Method 2
        $carData =
        [
            'maker_id' => 2,
            'model_id' => 1,
            'year' => 2012,
            'price' => 50000,
            'vin' => "Something",
            'mileage' => "Something",
            'car_type_id' => 2,
            'fuel_type_id' => 3,
            'user_id' => 1,
            'city_id' => 3,
            'address' => "Address 6",
            'phone' => "0567891234",
            'description' => null,
            'published_at' => now(),
        ];

        //Approach 1
        Car::create($carData);

        //Approach 2
        //$car = new Car();
        //$car->fill($carData);
        //$car->save();

        //Approach 3
        //$car1 = new Car($carData);
        //$car1->save();

        return view('home.index');
    }
}
 