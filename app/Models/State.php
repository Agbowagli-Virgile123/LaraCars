<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name'] ;

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

}
