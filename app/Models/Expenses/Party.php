<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
   protected $table = 'party_details';
   protected $guarded = [];
   public function city(){
    	return $this->belongsTo('App\City','party_city');
    }
}
