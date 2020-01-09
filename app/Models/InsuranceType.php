<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceType extends Model
{
    protected $table = 'insurancetype_mast';
    protected $guarded = [];

    public function ins_comp()
    {
    	return $this->belongsTo('App\Models\InsuranceCompany','ins_id','id');
    }
}
