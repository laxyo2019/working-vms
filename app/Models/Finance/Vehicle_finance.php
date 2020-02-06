<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;

class Vehicle_finance extends Model
{
    protected $table = 'vehicle_finance_details';
   protected $guarded = [];

   public function vch_no(){
    	return $this->belongsTo('App\vehicle_master','vch_id','id');
    }
    public function city(){
    	return $this->belongsTo('App\City','customer_city_id','id');
    } 
    public function owner(){
        return $this->belongsTo('App\User','created_by');
    }
}

