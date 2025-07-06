<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Create Car Type
       CarType::factory()
            ->sequence(
                ['name' => 'Sedan'], 
                ['name' => 'Hatchback'], 
                ['name' => 'SUV'], 
                ['name' => 'Pickup Truck'], 
                ['name' => 'Minivan'], 
                ['name' => 'Jeep'], 
                ['name' => 'Coupe'], 
                ['name' => 'Crossover'], 
                ['name' => 'Sport Car']
            )
            ->count(9)
            ->create();

        //Create Fuel Types
        FuelType::factory()
            ->sequence(
                ['name' => 'Gasoline'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid']
            )
            ->count(4)
            ->create();
       

        //Create States with cities
        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego'],
            'Texas' => ['Houston', 'San Antonio', 'Dallas', 'Austin'],
            'Florida' => ['Miami, Orlando', 'Tampa', 'Jacksonville'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Yonkers'],
            'Illinois' => ['Chicago', 'Aurora', 'Naperville', 'Joliet']
        ];

        foreach($states as $state => $cities){
            State::factory()
                ->state(['name' => $state])
                ->has(
                        City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($citie) => ['name' => $citie], $cities))
                    )
                ->create();
        }

        //Create Makers with their corresponding models
        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'Highlander', 'RAV4', 'Pruis'],
            'Ford' => ['F-150', 'Escape', 'Explorer', 'Mustang', 'Fuison'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Odyseey'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu', 'Impala'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Maxima', 'Murano'],
            'Lexus' => ['RX400', 'RX450', 'RX350', 'ES350', 'LS500', 'IS300'],
        ];

        foreach($makers as $maker => $models){
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }


        //Create 3 users first, then create 2 more users,
        //and for each user (from the last 2  users) create 50 cars,
        //with images and features and add these cars to the favorites cars 
        //of these 2 users

        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $sequence) =>
                            ['position' => $sequence->index % 5 + 1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();

    }
}
