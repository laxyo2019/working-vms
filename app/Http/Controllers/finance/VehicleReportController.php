<?php

namespace App\Http\Controllers\finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Finance\Vehicle_finance;
use App\Models\Finance\Vehicle_finance_ins;
use App\vehicle_master;

class VehicleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $fleet_code  = session('fleet_code');
        $vehicles    = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('finance.report.index',compact('vehicles'));  
    }

    public function vehicle_installment(Request $request)
    { 
        // dd($request->all());
        $datas = Vehicle_finance_ins::with('vehicle_info','vch')->get();
        // dd($datas);
        return view('finance.report.vehicle_installment',compact('datas')); 
    }
    public function vehicle_finance_installment(Request $request)
    {
        $results = Vehicle_finance::where('vch_id',$request->vehicle_no)->with('vch_no','city')->first();
        // dd($results);
        $datas = Vehicle_finance_ins::where('request_id',$results->id)->get();
        return view('finance.report.vehicle_finance_installment',compact('results','datas')); 
    }

}
