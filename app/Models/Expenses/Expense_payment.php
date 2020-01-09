<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Expense_payment extends Model
{
    protected $table = 'expense_payment';
   protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vehicle_id');
    }
}
