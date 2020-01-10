<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


if (!function_exists('get_fleet_users')) {
  function get_fleet_users($id)
  {
    return User::where('parent_id',$id);
  }
}
