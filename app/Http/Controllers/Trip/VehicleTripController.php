<?php

namespace App\Http\Controllers\Trip;

use App\Models\Trip\Vehicle_Trip_point;
use App\Http\Controllers\Controller;
use App\Models\Trip\Vehicle_Trip;
use Illuminate\Http\Request;
use App\VehicleStatus;
use App\Driver;
use Session;
use Auth;


class VehicleTripController extends Controller
{
    public function index()
    { 
        $data     = get_vehicle_trips()->with('vehicle')->get();
        return view('Trip.vehicle_trip_entry.index',compact('data'));
    }
    public function create()
    {
        $vehicles = VehicleStatus::where('fleet_code',session('fleet_code'))->where('status','StandBy')->orWhere('status','ReadyForLoad')->with('vehicle')->get();
        $drivers  = Driver::where('fleet_code',session('fleet_code'))->get();
        $state    = get_state()->get();
        return view('Trip.vehicle_trip_entry.create',compact('vehicles','drivers','state'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data1 = $this->all_form_data($request);
        $data  = $this->pay_validate($request,$data1);    

        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        $data['status']     = "Running";
        $last_id            = Vehicle_Trip::create($data)->id;

        if($request->trip_to_state_list !=null){
        $trip_to_state_list = $request->trip_to_state_list;
        $trip_to_city_list  = $request->trip_to_city_list;
        $count = count($trip_to_state_list);
        $x = 0;
        $res = array();
        while($x < $count) {
            
            $res['trip_to_state_list'] = $trip_to_state_list[$x];
            $res['trip_to_city_list']  = $trip_to_city_list[$x];
            $res['request_id']         = $last_id;
        Vehicle_Trip_point::insert($res);
             $x++;  
         } 
        }
        VehicleStatus::where('vch_id',$request->vch_id)->update(["status" => "Running"]);
        return redirect('/Trip');
    }
    public function show($id)
    {
     
    }
    public function edit($id)
    {
        $data        = Vehicle_Trip::find($id);
        $trips       = Vehicle_Trip_point::where('request_id',$id)->get();
         // return $trips[0]['trip_to_state_list'];
        $count       = collect($trips)->count();
        // return $count;
        $data_vch_id = $data->vch_id;
        $vehicles    = VehicleStatus::where('fleet_code',session('fleet_code'))->where('status','StandBy')->orWhere('status','ReadyForLoad')->orwhere('vch_id',$data_vch_id)->with('vehicle')->get();
        $drivers     = Driver::where('fleet_code',session('fleet_code'))->get();
        $state       = get_state()->get();
        $city        = get_city()->get();
        return view('Trip.vehicle_trip_entry.edit',compact('trips','vehicles','drivers','state','city','data','count'));
    }
    public function update(Request $request, $id)
    {
        $data1 = $this->all_form_data($request);
        $data  = $this->pay_validate($request,$data1);    
        Vehicle_Trip::find($id)->update($data);
        if($request->trip_to_state_list !=null){
        $trip_to_state_list = $request->trip_to_state_list;
        $trip_to_city_list  = $request->trip_to_city_list;
        $count = count($trip_to_state_list);
        $x = 0;
        $res = array();
        while($x < $count) {
            
            $res['trip_to_state_list'] = $trip_to_state_list[$x];
            $res['trip_to_city_list']  = $trip_to_city_list[$x];
            $res['request_id']         = $last_id;
        Vehicle_Trip_point::where('request_id',$id)->update($res);
             $x++;  
         } 
        }
        VehicleStatus::where('vch_id',$request->vch_id)->update(['status' => $request->status]);
        return redirect('/Trip');
    }
    public function destroy($id)
    {
        Vehicle_Trip::find($id)->delete();
        Vehicle_Trip_point::where('request_id',$id)->delete();
        return redirect('/Trip');
        
    }
    public function vch_status_get(Request $request)
    {
        $vehicles = VehicleStatus::where('vch_id',$request->id)->select('status')->first();
        return $vehicles;
    }
    public function all_form_data($request){

        $vdata = $request->validate([
                          'vch_id'          => 'required|not_in:0',
                          'driver_name'     => 'nullable',
                          'trip_from_state' => 'required|not_in:0',
                          'trip_from_city'  => 'required|not_in:0',
                          'trip_to_state'   => 'required|not_in:0',
                          'trip_to_city'    => 'required|not_in:0',
                          'starting_date'   => 'required',                             
                          'ending_date'     => 'required',
                          'trip_amt'        => 'required',
                          'years'           => 'nullable',
                          'months'          => 'nullable',
                          'days'            => 'nullable',
                          'status'          => 'nullable',
                          'remarks'         => 'nullable',
                          'payment_status'  => 'required',
                          'payment_mode'    => 'required|not_in:0',
                                  // 'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                ]);
        return $vdata;
    }
    public function get_state(){
        $states = get_state()->get();
        return $states;

    }
    public function pay_validate(Request $request,$data)
    {  
          if($request->payment_mode == 'cheque'){                             
           $request->validate([ "cpay_no"      => 'required|numeric',
                                         "cpay_dt"      => 'required',
                                         "cpay_bank"    => 'required|alpha',
                                         "cpay_branch"  => 'required|alpha',                                 
                                        ]);
            $Vdata['pay_no']  = $request->cpay_no;
           $Vdata['pay_dt'] = $request->cpay_dt;
           $Vdata['pay_bank'] = $request->cpay_bank;
           $Vdata['pay_branch'] = $request->cpay_branch;
            $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'dd'){
                             
           $request->validate([ "dpay_no"      => 'required|numeric',
                                         "dpay_dt"      => 'required',
                                         "dpay_bank"    => 'required|alpha',
                                         "dpay_branch"  => 'required|alpha',                                 
                                        ]);
            $Vdata['pay_no']  = $request->dpay_no;
           $Vdata['pay_dt'] = $request->dpay_dt;
           $Vdata['pay_bank'] = $request->dpay_bank;
           $Vdata['pay_branch'] = $request->dpay_branch;
            $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'rtgs'){
                             
            $request->validate([ "rpay_no"      => 'required|numeric',
                                 "rpay_dt"      => 'required',
                                 "rpay_bank"    => 'required|alpha',
                                 "rpay_branch"  => 'required|alpha',                                 
                                        ]);
           $Vdata['pay_no']  = $request->rpay_no;
           $Vdata['pay_dt'] = $request->rpay_dt;
           $Vdata['pay_bank'] = $request->rpay_bank;
           $Vdata['pay_branch'] = $request->rpay_branch;
           $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'neft'){
                             
           $request->validate([ "npay_no"      => 'required|numeric',
                                "npay_dt"      => 'required',
                                "npay_bank"    => 'required|alpha',
                                "npay_branch"  => 'required|alpha'                                 
                                        ]);
           $Vdata['pay_no']  = $request->npay_no;
           $Vdata['pay_dt'] = $request->npay_dt;
           $Vdata['pay_bank'] = $request->npay_bank;
           $Vdata['pay_branch'] = $request->npay_branch;
            $data = array_merge($data, $Vdata);   
        }
        return $data;
    }
}
