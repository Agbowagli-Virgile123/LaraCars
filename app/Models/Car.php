<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at'
    ];

    public function features(){

        return $this->hasOne(CarFeatures::class, 'car_id');

    }

    //Get the first or oldest car image created
    public function primaryImage(){

        return $this->hasOne(CarImage::class)->oldestOfMany('position');

    }

    public function images(){

        return $this->hasMany(CarImage::class);
    
    }

    public function carTypes(){

        return $this->belongsTo(CarType::class, 'car_type_id');

    }
}
