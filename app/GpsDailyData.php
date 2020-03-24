<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GpsDailyData extends Model
{
    protected $table   = 'gs_daily_move';
    protected $guarded = [];

    public function vehicle(){
    	return $this->hasOne('App\vehicle_master','vch_imei','imei');
    }
}
