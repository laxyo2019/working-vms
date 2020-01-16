<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expenses\Party;
use App\vehicle_master;
use App\Models\Expenses\ExpensesType;

class ExpensesController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses.all_expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // $vehicles   = vehicle_master::where('fleet_code',$fleet_code)->get();
        $vehicles = get_vehicle()->get();
        $party_types = ExpensesType::all();
        $Party = Party::all();
        return view('expenses.all_expenses.create',compact('party_types','vehicles','Party'));
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
    public function get_vch_avg(Request $request)
    {
        $vch_id = $request->vch_id;
        $fleet_code = session('fleet_code');
        $vehicles  = get_vehicle()->where('id',$vch_id)->first();
        $data = $vehicles->reg_mileage;
        return $data;
        // return response()->json($data);
    }
}
