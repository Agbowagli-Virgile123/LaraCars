<?php

namespace App\Models;

use Database\Factories\MakerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;

class Maker extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['maker'] ;


    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    //If the factory name is different fron the Model name, then we need to specify the name through this function
    // protected static function newFactory(){

    //     return MakerFactory::new();

    // }

}
