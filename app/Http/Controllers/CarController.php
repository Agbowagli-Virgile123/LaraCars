<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user = Auth::user();
        $user = User::find(1);

        $cars = $user->cars()
                    ->with(['primaryImage','model.maker'])
                    ->orderBy('created_at', 'desc')->Paginate(15);

        return view('car.index',['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        
        return view('car.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    //Search Method
    public function search()
    {
        $query = Car::where('published_at', '<', now())
                    ->with(['primaryImage', 'city', 'model.maker', 'carType','fueltype'])
                    ->orderBy('published_at', 'desc');

    
        $cars = $query->paginate(15);

        return view('car.search', ['cars' => $cars]);
    }

    public function watchlist()
    {
        $cars = User::find(4)
                    ->favouriteCars()
                    ->with(['primaryImage', 'city', 'model.maker', 'carType','fueltype'])
                    ->orderBy('created_at,', 'desc')->paginate(15);

        return view('car.watchlist', ['cars' => $cars]);
    }
}
