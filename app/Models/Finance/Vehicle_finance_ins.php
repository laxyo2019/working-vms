<?php

namespace App\Models\Finance; 

use Illuminate\Database\Eloquent\Model;

class Vehicle_finance_ins extends Model
{
   protected $table = 'vehicle_finance_installment_details';
   protected $guarded = [];

   public function vehicle_info(){
    	return $this->belongsTo('App\Models\Finance\Vehicle_finance','request_id');
    }
    public function vch(){
    	return $this->belongsTo('App\vehicle_master','vch_id','id');
    }
}
