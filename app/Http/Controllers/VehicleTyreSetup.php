<?php

namespace App\Http\Controllers;

use App\Models\Accessories\AccessoriesDetailsList;
use App\Models\Tyre\TyreDetailsList;
use App\Models\Tyre\TyreInfo;
use Illuminate\Http\Request;
use Session;
use Auth;

class VehicleTyreSetup extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleet_code = session('fleet_code');
        $data       = TyreInfo::where('fleet_code',$fleet_code)->with('vehicle')->get();
        return view('vehicle_tyre_setup.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fleet_code = session('fleet_code');
        $data       = TyreInfo::where('fleet_code',$fleet_code)->select('vch_no')->get();
        $vehicles   = get_vehicle()->whereNotIn('id',$data)->get();
        return view('vehicle_tyre_setup.create',compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
  
    $tyre_count = '0';
    $acce_count = '0';

    $i = 1;
    foreach ($request->tyre_no as $value) {
        if($value != null) {
            $tyre_count = $i;
            $i++;
        }
    }
    $j =1;
    foreach ($request->material_qty as $value) {
        if($value != null) {
            $acce_count = $j;
            $j++;
        }
    }

    $last_id = '';
    $data  = $request->validate([ 
        'vch_no'     => 'required|not_in:0',
    ]);

    if($tyre_count > 0 || $acce_count > 0 ){
       
        $data['fleet_code']   = session('fleet_code');
        $data['created_by']   = Auth::user()->id;
        $data['total_tyre']   = $tyre_count;
        $data['total_acce']   = $acce_count;
        $last_id = TyreInfo::create($data)->id;

    }else{
        return redirect()->back()->with('warning','Tyre Inforamtion and Accessories Inforamtion Required');

    }
  

    foreach ($request->tyre_no as $key => $value) {
        if($value != null) {
            $data1['fleet_code']         = session('fleet_code');
            $data1['created_by']         = Auth::user()->id;
            $data1['request_id']         = $last_id;
            $data1['vch_no']             = $request->vch_no;
            $data1['tyre_no']            = $value;
            $data1['tyre_position']      = $request->tyre_position[$key];
            $data1['tyre_des']           = $request->tyre_des[$key];
            $data1['vch_cur_km']         = $request->vch_cur_km[$key];
            $data1['tyre_exp_km']        = $request->tyre_exp_km[$key];
            TyreDetailsList::create($data1);
        }
    }

    foreach ($request->material_qty as $key => $value) {
        if($value != null) {
            $data2['fleet_code']         = session('fleet_code');
            $data2['created_by']         = Auth::user()->id;
            $data2['request_id']         = $last_id;
            $data2['vch_no']             = $request->vch_no;
            $data2['material_qty']       = $value;
            $data2['material_name']      = $request->material_name[$key];
            $data2['material_des']       = $request->material_des[$key];
            AccessoriesDetailsList::create($data2);
        }
    }
  
    return redirect()->route('vch_tyre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $tyreinfo        = TyreInfo::where('id',$id)
                            ->with(['vehicle'=>function($query){$query->select('vch_no','id');}])
                            ->select('vch_no')->first();
       $TyreDetail      = TyreDetailsList::where('request_id',$id)->get();
       $AcceDetail      = AccessoriesDetailsList::where('request_id',$id)->get();
        return view('vehicle_tyre_setup.show',compact('tyreinfo','TyreDetail','AcceDetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $tyreinfo = TyreInfo::find($id);
       // dd($tyreinfo);
       TyreDetailsList::where('request_id',$id)->get();
       AccessoriesDetailsList::where('request_id',$id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       TyreInfo::find($id)->delete();
       TyreDetailsList::where('request_id',$id)->delete();
       AccessoriesDetailsList::where('request_id',$id)->delete();
       return redirect()->route('vch_tyre.index');
        
    }
}
