<?php

namespace App\Http\Controllers\Trip;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use App\State;
use App\VehicleStatus;


class VehicleTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Trip.vehicle_trip_entry.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = VehicleStatus::where('fleet_code',session('fleet_code'))->where('status','StandBy')->orWhere('status','ReadyForLoad')->with('vehicle')->get();
        $state  = State::where('fleet_code',session('fleet_code'))->get();
        $drivers = Driver::where('fleet_code',session('fleet_code'))->get();
        return view('Trip.vehicle_trip_entry.create',compact('vehicles','drivers','state'));
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
    public function vch_status_get(Request $request)
    {
        $vehicles = VehicleStatus::where('vch_id',$request->id)->select('status')->first();
        return $vehicles;
    }
}
