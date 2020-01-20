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
}
