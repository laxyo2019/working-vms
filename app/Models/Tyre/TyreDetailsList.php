<?php

namespace App\Models\tyre;

use Illuminate\Database\Eloquent\Model;

class TyreDetailsList extends Model
{
    protected $table   = 'vehicle_tyre_details_list';
    protected $guarded = [];
    
    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_no');
    }
}
