<?php

namespace Database\Factories;

use App\Models\Maker;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maker>
 */
class MakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     //Call the model this factory is binded to
    //protected $model = Maker::class;
    public function definition(): array
    {
        return [
            "name"=> fake()->word(),
        ];
    }
}
