<?php

use App\User;
use App\State;
use App\vehicle_master;
use App\VehicleStatus;
use App\Models\PUCDetails;
use App\Models\RcDetails;
use App\Models\FitnessDetails;
use App\Models\StatePermit;
use App\Models\RoadtaxDetails;
use App\Models\InsuranceDetails;
use App\Models\Trip\Vehicle_Trip;
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

if (!function_exists('get_state')) {
  function get_state()
  {
   return State::where('fleet_code',session('fleet_code'));

  }
}

if (!function_exists('get_vehicle_status')) {
  function get_vehicle_status()
  {
   return VehicleStatus::where('fleet_code',session('fleet_code'));

  }
}

if (!function_exists('get_vehicle_trips')) {
  function get_vehicle_trips()
  {
   return Vehicle_Trip::where('fleet_code',session('fleet_code'));

  }
}

if (!function_exists('get_puc_details')) {
  function get_puc_details()
  {
   return PUCDetails::where('fleet_code',session('fleet_code'));

  }
}

if (!function_exists('get_rc_details')) {
  function get_rc_details()
  {
   return RcDetails::where('fleet_code',session('fleet_code'));

  }
}
if (!function_exists('get_fitness_details')) {
  function get_fitness_details()
  {
   return FitnessDetails::where('fleet_code',session('fleet_code'));

  }
}
if (!function_exists('get_road_tax_details')) {
  function get_road_tax_details()
  {
   return RoadtaxDetails::where('fleet_code',session('fleet_code'));

  }
}
if (!function_exists('get_insurance_details')) {
  function get_insurance_details()
  {
   return InsuranceDetails::where('fleet_code',session('fleet_code'));

  }
}
if (!function_exists('get_permimt_details')) {
  function get_permimt_details()
  {
   return StatePermit::where('fleet_code',session('fleet_code'));

  }
}
if (!function_exists('get_expenses_details')) {
  function get_expenses_details()
  {
   return Vehicle_Trip::where('fleet_code',session('fleet_code'));

  }
}
if (!function_exists('get_trip_details')) {
  function get_trip_details()
  {
   return Vehicle_Trip::where('fleet_code',session('fleet_code'));

  }
}
