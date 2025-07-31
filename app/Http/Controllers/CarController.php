<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\User;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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

        $user = User::find(3);

        $carAttributes = $request->validate([
            'maker_id' => 'required|exists:makers,id',
            'model_id' => 'required|exists:models,id',
            'year' => ['required', Rule::date()->format('Y') ],
            'price' => 'required|numeric:strict|min:1',
            'vin' => 'required|size:17',
            'mileage' => 'required|numeric',
            'car_type_id' => 'required|exists:car_types,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|min:2',
            'phone' => 'required',
            'description' => ['nullable', 'min:5'],
            'published_at' => 'nullable',
            'img' => ['required', File::types(['png','jpeg','jpg', 'webp'])]

        ], [
            'car_type_id.required' => 'Pick car type',
            'fuel_type_id.required' => 'Pick fuel type',
        ], [
            'maker_id' => 'maker',
            'model_id' => 'model',
            'car_type_id' => 'car type',
            'fuel_type_id' => 'fuel type',
            'state_id' => 'state',
            'city_id' => 'city',
            'img' => 'image'

        ]);


        if( $request->img){
            $img_path = $request->img->store('Uploads');
        }


       $newCar = $user->cars()->create([

        'maker_id' => $carAttributes['maker_id'],
        'model_id' => $carAttributes['model_id'],
        'year' => $carAttributes['year'],
        'price' => $carAttributes['price'],
        'vin' => $carAttributes['vin'],
        'mileage' => $carAttributes['mileage'],
        'car_type_id' => $carAttributes['car_type_id'],
        'fuel_type_id' => $carAttributes['fuel_type_id'],
        'city_id' => $carAttributes['city_id'],
        'address' => $carAttributes['address'],
        'phone' => $carAttributes['phone'],
        'description' => $carAttributes['description'],
        'published_at' =>  isset($carAttributes['published_at']) ? now() : "",

       ]);


       $newCar->features()->create([
            'abs' => $request->abs ?? 0,
            'air_conditioning' => $request->air_conditioning ?? 0,
            'power_windows' => $request->power_windows ?? 0,
            'power_door_locks' => $request->power_door_locks ?? 0,
            'cruise_control' => $request->cruise_control ?? 0,
            'bluetooth_connectivity' => $request->bluetooth_connectivity ?? 0,
            'remote_start' => $request->remote_start ?? 0,
            'gps_navigation' => $request->gps_navigation ?? 0,
            'heated_seats' => $request->heated_seats ?? 0,
            'climate_control' => $request->crimate_control ?? 0,
            'rear_parking_sensors' => $request->rear_parking_sensors ?? 0,
            'leather_seats' => $request->leather_seats ?? 0,
       ]);

       $newCar->images()->create([
       'image_path' => $img_path,
       'position' => 1       
       ]); 

       return redirect()->back()->with('msg', 'Car Created Successfully');
       

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

       if(isset($request->sort)){

            if($request->sort == "price"){
                $query->orderBy('price', 'asc');
            }else if($request->sort == "-price"){
                $query->orderBy('price', 'desc');
            }else if($request->sort == 'year'){
                $query->orderBy('year', 'asc');
            }else if($request->sort == '-year'){
                $query->orderBy('year', 'desc');
            }
       };


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

    public function Reset(Request $request){

        $request->clear();

    }
}
