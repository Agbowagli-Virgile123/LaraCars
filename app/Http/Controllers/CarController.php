<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Query\Builder;
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
    public function search(Request $request)
    {
        $query = Car::with(['primaryImage', 'city', 'model.maker', 'carType','fueltype'])
                        ->where('published_at', '<', now());

        //Apply or the filtering if the value is provided
        $query->when($request->maker_id, fn($builder, $maker) => $builder->where('maker_id', $maker));
        $query->when($request->model_id, fn($builder, $model) => $builder->where('model_id', $model));
        $query->when($request->state_id, fn($builder, $state) => $builder->where('state_id', $state));
        $query->when($request->city_id, fn($builder, $city) => $builder->where('city_id', $city));
        $query->when($request->car_type_id, fn($builder, $carType) => $builder->where('car_type_id', $carType));
        $query->when($request->fuel_type_id, fn($builder, $fuelType) => $builder->where('fuel_type_id', $fuelType));

        $query->when($request->filled(['year_from', 'year_to']) , fn($builder) => $builder->whereBetween('year', [$request->year_from, $request->year_to]));

        $query->when( $request->filled(['price_from', 'price_to']), fn($builder) => $builder->whereBetween('price', [$request->price_from, $request->price_to]));

        $cars = $query->orderBy('published_at', 'desc')->paginate(15);

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
