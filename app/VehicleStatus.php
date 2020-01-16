<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleStatus extends Model
{
    protected $table = 'vch_status';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
}
