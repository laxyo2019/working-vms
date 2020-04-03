<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre\TyreDetailsList;
use App\Models\Tyre\TyreInfo;
use App\vehicle_master;
use App\GpsDailyData;
use Session;
use Auth;

class VehicleTyreInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleet_code = session('fleet_code');
        $data     = vehicle_master::where('fleet_code',$fleet_code)->select('id','vch_imei')->get();
        $vch_id   = collect($data)->pluck('id');
        $vch_imei = collect($data)->pluck('vch_imei');
        $tyre_list       = TyreDetailsList::where('fleet_code',$fleet_code)->orWhereIn('vch_no',$vch_id)->get();
        $gps_imei        = GpsDailyData::WhereIn('imei',$vch_imei)->select('duty_date','imei','reading')->with(['vehicle'=>function($query){ 
            $query->select('vch_imei','id','vch_no')->with('tyre')->get(); 
        }])->get();
        // return $gps_imei;
        return view('tyre_info.index',compact('gps_imei')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
