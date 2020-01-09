<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expenses\Expense_Entry_Item;
use App\vehicle_master;
use App\Models\Expenses\Accident;
use App\City;

class ExpensesReportController extends Controller
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
        $cities      = City::where('fleet_code',$fleet_code)->get();
        $drivers     = Accident::where('fleet_code',$fleet_code)->select('driver_name')->get();
        $parties     = Expense_Entry_Item::distinct()->select('job_by')->where('fleet_code',$fleet_code)->groupBy('job_by')->get();
        // dd($drivers);
        return view('expenses.expenses_report.index',compact('vehicles','parties','cities','drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.expenses_report.create');    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vehicle_report(Request $request)
    {   
        $vehicle_no  = $request->report_vehicle_no;
        $date_from   = $request->report_vehicle_date_from;
        $date_to     = $request->report_vehicle_date_to;
        $fleet_code  = session('fleet_code');
        $vehicle = vehicle_master::where('id',$vehicle_no)->first();
        if(!$date_from){
                    $datas = Expense_Entry_Item::where('fleet_code',$fleet_code)
                            ->where('vehicle_id',$vehicle_no)->with('bill')
                            ->get();
        }else{
                $datas = Expense_Entry_Item::where('fleet_code',$fleet_code)
                            ->where('vehicle_id',$vehicle_no)->with('bill')
                            ->whereBetween('created_at', array($date_from, $date_to))->get();
        }
        $date =date("Y-m-d", time());
        return view('expenses.expenses_report.vehicle_wise',compact('date','datas','vehicle')); 
    }

    public function vehicle_party_report(Request $request)
    {
        $party_name  = $request->party_name;
        $date_from   = $request->party_date_from;
        $date_to     = $request->party_date_to;
        $fleet_code  = session('fleet_code');

        if(!$date_from){

            $datas  = Expense_Entry_Item::where('fleet_code',$fleet_code)
                            ->where('job_by',$party_name)->with('bill','vehicle')
                            ->get();
           } else{

            $datas  = Expense_Entry_Item::where('fleet_code',$fleet_code)
                            ->where('job_by',$party_name)->with('bill','vehicle')
                            ->whereBetween('created_at', array($date_from, $date_to))->get();
            }

        $date =date("Y-m-d", time());
        return view('expenses.expenses_report.party_wise',compact('date','datas','party_name')); 
    }

    public function vehicle_yearly_report(Request $request)
    {
        dd($request->all());
        return view('expenses.expenses_report.vehicle_wise'); 
    }

    public function accident_report(Request $request)
    {
       $date =date("Y-m-d", time());
       $fleet_code  = session('fleet_code');
       $vehicle_no  = $request->accident_vehicle_no;
       $city        = $request->accident_city;
       //$driver      = $request->accident_driver;
       $date_from   = $request->accident_date_from;
       $date_to     = $request->accident_date_to != '' ? $request->accident_date_to : $date;
        // dd($date_to);
       if(!$date_from){
                $datas = Accident::where('fleet_code',$fleet_code)
                            ->where('vehicle_no',$vehicle_no)->with('vehicle','city')->get();
        }else{
                $datas = Accident::where('fleet_code',$fleet_code)
                            ->where('vehicle_no',$vehicle_no)->with('vehicle','city')
                            ->whereBetween('entry_date', array($date_from, $date_to))->get();
        }
        return view('expenses.expenses_report.accident_wise',compact('date','datas')); 
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
