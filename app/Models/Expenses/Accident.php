<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
   protected $table = 'accident_details';
   protected $guarded = [];

   public function vehicle()
   {
   	return $this->belongsTo('App\vehicle_master','vehicle_no','id');
   }
   public function city()
   {
   	return $this->belongsTo('App\City','accident_city','id');
   }
}
