<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

class Expense_payment_item extends Model
{
    protected $table = 'expense_payment_item_entry';
   protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
    public function payment_detail(){
    	return $this->belongsTo('App\Models\Expenses\Expense_payment','request_id');
    }

}
