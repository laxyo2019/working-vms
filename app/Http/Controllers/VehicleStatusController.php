<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleStatus;
use Auth;

class VehicleStatusController extends Controller
{
    public function index()
    {
        $fleet_code = session('fleet_code');
        $vch_status = VehicleStatus::where('fleet_code',$fleet_code)->get();
        $data       = get_vehicle()->get();
        return view('vehicle_status.index',compact('data','vch_status'));
    }
    public function create()
    {
        $fleet_code = session('fleet_code');
        $data       = VehicleStatus::where('fleet_code',$fleet_code)->select('vch_id')->get();
        $vch_id = array();
        foreach($data as $data1)
        {
            $vch_id[] = $data1->vch_id;
        }
        $vehicles = get_vehicle()->whereNotIn('id',$vch_id)->get();
        return view('vehicle_status.create',compact('vehicles'));
    }
    public function store(Request $request)
    {
        $data =[ 
            'vch_id' => $request->vch_id, 
            'status' => $request->status 
        ];
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        if($request->btnID == 'submit'){
        VehicleStatus::create($data);
        return ("Add SuccessFully");
       }elseif ($request->btnID == 'edit') {
        VehicleStatus::where('fleet_code',session('fleet_code'))->where('vch_id',$request->vch_id)->update($data);
        return ("Update SuccessFully");
       }
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        return view('vehicle_status.edit');
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
        dd('this is from destroy');
    }
}
