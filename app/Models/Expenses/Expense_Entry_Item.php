<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Expense_Entry_Item extends Model
{
    protected $table = 'expense_entry_item';
   protected $guarded = [];

   public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vehicle_id');
    }
    public function bill(){
    	return $this->belongsTo('App\Models\Expenses\Expense_Entry','entry_id');
    }
}
