<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class CarType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'] ;

    public function cars(){
        return $this->hasMany(Car::class, 'car_type_id');
    }
}
