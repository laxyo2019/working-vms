<?php

namespace App\Http\Controllers\Trip;

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
        $data               = $this->all_form_data($request);
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        $data['status']     = "Running";
        Vehicle_Trip::create($data);
        VehicleStatus::where('vch_id',$request->vch_id)->update(["status" => "Running"]);
        return redirect('/Trip');
    }
    public function show($id)
    {
     
    }
    public function edit($id)
    {
        $data        = Vehicle_Trip::find($id);
        $data_vch_id = $data->vch_id;
        $vehicles    = VehicleStatus::where('fleet_code',session('fleet_code'))->where('status','StandBy')->orWhere('status','ReadyForLoad')->orwhere('vch_id',$data_vch_id)->with('vehicle')->get();
        $drivers     = Driver::where('fleet_code',session('fleet_code'))->get();
        $state       = get_state()->get();
        $city        = get_city()->get();
        return view('Trip.vehicle_trip_entry.edit',compact('vehicles','drivers','state','city','data'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->all_form_data($request);
        Vehicle_Trip::find($id)->update($data);
        VehicleStatus::where('vch_id',$request->vch_id)->update(['status' => $request->status]);
        return redirect('/Trip');
    }
    public function destroy($id)
    {
        Vehicle_Trip::find($id)->delete();
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
                                  // 'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                ]);
        return $vdata;
    }
    public function get_state(){
        $states = get_state()->get();
        return $states;

    }
}
