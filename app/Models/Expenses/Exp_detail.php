<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Exp_detail extends Model
{
   protected $table = 'exp_details';
   protected $guarded = [];

   public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_no');
    }
}
