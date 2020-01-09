<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Expense_Entry extends Model
{ 
    protected $table = 'expense_entry';
   protected $guarded = [];

   public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vehicle_id');
    }

}
