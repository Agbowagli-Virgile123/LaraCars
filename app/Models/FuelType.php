<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasFactory;

     /**
     * Specify the database if it is different from the Model name
     * protected $table = 'car_fuel_types';
     */

     /**
     * Laravel assume that the primary key of every table is id but in case tou want to change it do this
     * protected $primaryKey = 'fuel_type_id';
     */

     /**
     *Disable auto increameting of the id
     *public $incrementing = false;
     */

     /**
     * Changing the data type of the primary key
     * protected $keyType = 'string';
     */

      /**
     * Disable timestamps which are created_at and updated_at
     */
    
    /**
     * Customize the created_at and updated-at
     *  const CREATED_AT = "createdDate";
     */
    public $timestamps = false;

    protected $fillable = ['name'] ;
   



}
