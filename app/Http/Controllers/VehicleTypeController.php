<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\GpsDailyData;
use Session;
use Auth;

class VehicleTypeController extends Controller
{
    public function index()
    { 
        // $data = get_vehicle()->select('vch_no','vch_imei')->with(['imei' => function($query){
        //     $query->select('reading','imei','duty_date');
        // }])->get();
        // return $data;
        $fleet_code = session('fleet_code');
        $data       = VehicleType::where('fleet_code',$fleet_code)->get();
        return view('vehicle_type.index',compact('data'));
    }
    public function create()
    {
       
        return view('vehicle_type.create');
         
    }
    public function store(Request $request)
    {
        $fleet_code = Session('fleet_code');
        $data       = $request->validate([ 'vch_type'     => 'required|unique:vch_types']);
        $data['vch_type']     = strtoupper($data['vch_type']);
        $data['fleet_code']   = $fleet_code;
        $data['created_by']  = Auth::user()->id;
        VehicleType::create($data);
        return redirect()->route('vch_type.index');
    }
    public function edit($id)
    {
        $data = VehicleType::where('id',$id)->first();
        return view('vehicle_type.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $fleet_code = Session('fleet_code');
        $data       = $request->validate([ 'vch_type'     => 'required|unique:vch_types']);
        $data['vch_type']     = strtoupper($data['vch_type']);
        $data['fleet_code']   = $fleet_code;
        $data['created_by']  = Auth::user()->id;
        VehicleType::where('id',$id)->update($data);
        return redirect()->route('vch_type.index');

    }
    public function destroy($id)
    {
        VehicleType::find($id)->delete();
        return redirect()->route('vch_type.index');
        
    }
    public function add_vch_type(Request $request){
        $fleet_code = Session('fleet_code');
        $data       = $request->validate([ 'vch_type'     => 'required|unique:vch_types']);
        $data['vch_type']     = strtoupper($data['vch_type']);
        $data['fleet_code']   = $fleet_code;
        $data['created_by']  = Auth::user()->id;
        VehicleType::create($data);
        return redirect()->route('vehicledetails.create');   
    }
    public function vch_type_info(Request $request){
        $id = $request->id;
        $vch_data = get_vehicle()->where('id',$id)->with('type')->select('vch_type','reg_no_tyres')->first();
        return $vch_data;
    }
}
