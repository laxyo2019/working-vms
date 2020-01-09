<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TyrePurchase extends Model
{
    protected $table   = 'tyre_purchase_order';
    protected $guarded = [];

    public function vendor()
    {
    	return $this->belongsTo('App\Models\TyreVendor','vendor_code','id');
    } 
}
