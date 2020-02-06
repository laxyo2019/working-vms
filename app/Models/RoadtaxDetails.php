<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadtaxDetails extends Model
{
    protected $table   = 'doc_roadtax_det';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
    public function agent(){
    	return $this->belongsTo('App\Models\Agent','agent_id');
    }
    public function owner(){
        return $this->belongsTo('App\User','created_by');
    }
 
}
