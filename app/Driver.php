<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table    = 'driver_mast';
    protected $guarded = []; 

    public function vehicles()
    {
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
}
