<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TyreCompany;

class TyreModel extends Model 
{
    protected $table   = 'tyre_model_mast';
    protected $guarded = [];

    public function company()
    {
    	return $this->belongsTo('App\Models\TyreCompany','comp_id','id'); 
    }
}
