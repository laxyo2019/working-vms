<?php

namespace App\Models\Trip;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Trip_point extends Model
{
    protected $table = 'vehicle_trip_point';
    protected $guarded = [];  

    public function from_city(){
        return $this->belongsTo('App\City','trip_from_city');
    }
    public function to_city(){
        return $this->belongsTo('App\City','trip_to_city');
    }
}
