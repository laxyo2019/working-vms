<?php

namespace App\Models\Trip;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Trip extends Model
{
    protected $table = 'vehicles_tripes';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
    public function owner(){
        return $this->belongsTo('App\User','created_by');
    }
    public function from_city(){
        return $this->belongsTo('App\City','trip_from_city');
    }
    public function to_city(){
        return $this->belongsTo('App\City','trip_to_city');
    }
}
