<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TyreMaterialItemRequest extends Model
{
    protected $table   = 'tyre_mtr_req_items';
    protected $guarded = [];

    public function item()
    {
    	return $this->hasMany('App\Models\TyreMaterial','request_id','id');
    }
}
