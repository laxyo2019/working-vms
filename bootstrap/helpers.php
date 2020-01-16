<?php

use App\User;
use App\vehicle_master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


if (!function_exists('get_fleet_users')) {
  function get_fleet_users($id)
  {
    return User::where('parent_id',$id);
  }
}

if (!function_exists('get_vehicle')) {
  function get_vehicle()
  {
  	$fleet_code = session('fleet_code');
    return vehicle_master::where('fleet_code',$fleet_code);
  }
}

// if (!function_exists('get_vehicle_status')) {
//   function get_vehicle_status()
//   {
//     return vehicle_master;
//   }
// }
