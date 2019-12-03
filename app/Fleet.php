<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    protected $table = 'fleet_mast';
    protected $guarded = [];

    public function vehicles()
    {
    	return $this->hasMany('App\vehicle_master','fleet_code','fleet_code');
    }
}
