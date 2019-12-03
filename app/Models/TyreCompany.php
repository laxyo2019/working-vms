<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TyreModel;

class TyreCompany extends Model
{
    protected $table   = 'tyre_comp_mast';
    protected $guarded = [];

    public function detail()
    {
    	return $this->hasMany('App\Models\TyreModel','comp_id','id'); 
    }
}
