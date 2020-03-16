<?php

namespace App\Http\Controllers;

use App\Models\Expenses\VehicleExpenses;
use App\Models\Finance\Vehicle_finance;
use Illuminate\Support\Facades\Hash;
use App\Models\Expenses\Accident;
use App\Models\Trip\Vehicle_Trip;
use App\Models\InsuranceDetails;
use App\Models\RoadtaxDetails;
use App\Models\FitnessDetails;
use Illuminate\Http\Request;
use App\Models\StatePermit;
use App\Models\PUCDetails;
use App\Models\RcDetails;
use App\vehicle_master;
use App\VehicleStatus;
use App\FleetUser;
use App\Fleet;
use App\User;
use Session;
use Auth;
use File;
use DB;

class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
          
    }
    public function index()
    {
       $id          = Auth::user()->id;
       $hasfleet    = FleetUser::where('user_id',$id)->get();
       $count_fleet = count($hasfleet);
       $fleet_code  = session('fleet_code');
       $PUCDetails  = PUCDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
        if($fleet_code){ 
           $vehicle         = get_vehicle()->get(); 
           $vch_count       = collect($vehicle)->count();  

           $driver          = get_driver()->get(); 
           $driver_count    = collect($driver)->count();

           $insurance       = InsuranceDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $inscount        = collect($insurance)->count();

           
           $pucDetails      = PUCDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $puccount        = collect($pucDetails)->count();

           $fitnessetails   = FitnessDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $fitnesscount    = collect($fitnessetails)->count();

           $roadtax         = RoadtaxDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $roadcount       = collect($roadtax)->count();

           $permit          = StatePermit::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $permitcount     = collect($permit)->count();

           $rcdetails       = RcDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $rccount         = collect($rcdetails)->count();

           $accident        = Accident::with('vehicle')->where('fleet_code',$fleet_code)->get();
           $acicount        = collect($accident)->count();

           $expenses        = VehicleExpenses::where('fleet_code',$fleet_code)->whereYear('date',date('Y'))->sum('amount');

          $vch_finance      = Vehicle_finance::where('created_by',$id)->where('fleet_code',$fleet_code)->with('owner','vch_no')->get();

          $vch_trip         = Vehicle_Trip::where('created_by',$id)->whereYear('starting_date',date('Y'))->where('fleet_code',$fleet_code)->with('owner','vehicle','from_city','to_city')->get();
          $trip_count       = collect($vch_trip)->count();

          $vehicleStatus    = VehicleStatus::where('created_by',$id)->where('fleet_code',$fleet_code)->with('vehicle')->get();
          $running_vch      = collect($vehicleStatus)->where('status','Running');
          $running          = count($running_vch);
          $standby_vch      = collect($vehicleStatus)->where('status','StandBy');
          $standby          = count($standby_vch);
          $repair_vch       = collect($vehicleStatus)->where('status','Repair/Maintenance');
          $repair           = count($repair_vch);
          $unloaded_vch     = collect($vehicleStatus)->where('status','ReadyForLoad');
          $unloaded         = count($unloaded_vch);
       }
       else{
            $vehicle       = array();
            $vch_count     = 0;
            $driver        = array();
            $driver_count  = 0;
            $insurance     = array();          
            $inscount      = 0;
            $pucDetails    = array(); 
            $puccount      = 0;
            $fitnessetails = array();          
            $fitnesscount  = 0;
            $roadtax       = array();          
            $roadcount     = 0;
            $permit        = array();          
            $permitcount   = 0;
            $rcdetails     = array();          
            $rccount       = 0;
            $accident      = array();          
            $acicount      = 0;
            $expenses      = 0;
            $vch_finance   = array();
            $vch_trip      = array();
            $trip_count    = 0;
            $running_vch   = array();
            $running       = 0;
            $standby_vch   = array();
            $standby       = 0;
            $repair_vch    = array();
            $repair        = 0;
            $unloaded_vch  = array();
            $unloaded      = 0;
        }
        
        if($count_fleet != 0){ 

            if($count_fleet <= 1){
                $fleet_id   = Fleet::find($hasfleet[0]->fleet_id);
                $fleer_code = $fleet_id->fleet_code;
               
                Session::put('fleet_code', $fleer_code);
                
                $path = storage_path('app/public/'.$fleer_code.'/vehicle_number');
                               
                if(! File::exists($path)){
                    File::makeDirectory($path, 0777, true, true);
                } 
                          
                $data['fleet']    = 'no';
                $data['fleet_id'] = array(); 

                return view('dashboard1',compact('data','insurance','pucDetails','fitnessetails','roadtax','permit','rcdetails','inscount','puccount','fitnesscount','roadcount','permitcount','rccount','vehicle','vch_count','driver','driver_count','expenses','accident','acicount','running_vch','running','standby_vch','standby','repair_vch','repair','unloaded_vch','unloaded','vch_finance','vch_trip','trip_count'));
            }
            else{
                $data['fleet_id'] = FleetUser::where('user_id',$id)->get();
                $data['fleet']    = 'yes';
                return view('dashboard1',compact('data','insurance','pucDetails','fitnessetails','roadtax','permit','rcdetails','inscount','puccount','fitnesscount','roadcount','permitcount','rccount','vehicle','vch_count','driver','driver_count','expenses','accident','acicount','running_vch','running','standby_vch','standby','repair_vch','repair','unloaded_vch','unloaded','vch_finance','vch_trip','trip_count'));
            }
        }
        else{
            echo  "You Have Not Any Fleet Yet. Please Contact Your Account Owner..";
        }
        
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('change_password',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['old_password' =>'required',
                                     'new_password'=>'required'   
                                    ]);
       $current_password = Auth::User()->password;    
           
     if (!(Hash::check($request->old_password, Auth::user()->password))) 
      { 
         return redirect()->back()->with('error','Old password not matched');
        }
        else{
          
           $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($data['new_password']);
            $obj_user->save();
            return redirect()->back()->with("error","Password changed successfully !");
        }
    }
     public function fleet_ckeck(Request $request){        
        $fleer_code = $request->fleet_code;
        
        Session::put('fleet_code', $fleer_code);        
        $path = storage_path('app/public/'.$fleer_code.'/vehicle_number');                    
        if(! File::exists($path)){
            File::makeDirectory($path, 0777, true, true);
        }     
        return 'success';       
     }   
}

