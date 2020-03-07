<?php

namespace App\Http\Controllers\Expenses;

use App\Models\Expenses\ExpensesType;
use App\Http\Controllers\Controller;
use App\Models\Expenses\Exp_Trip_detail;
use App\Models\Expenses\Exp_detail;
use App\Models\Trip\Vehicle_Trip;
use App\Models\Expenses\Party;
use Illuminate\Http\Request;
use App\vehicle_master;
use App\Product;
use Auth;

class ExpensesController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Product::truncate();
        $datas  = Exp_detail::where('fleet_code',session('fleet_code'))->with('vehicle')->get();
        return view('expenses.all_expenses.index',compact('datas'));
    }

    public function create()
    {
        
        // $vehicles   = vehicle_master::where('fleet_code',$fleet_code)->get();
        $vehicles    = get_vehicle()->get();
        $party_types = ExpensesType::all();
        $trips       = Vehicle_Trip::where('fleet_code',session('fleet_code'))->get();
        $Party       = Party::all(); 
        return view('expenses.all_expenses.create',compact('party_types','vehicles','Party','trips'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
       if($request->party_type == 'FUEL'){
        $data = $this->validate($request,[ 
                                    'party_name'      => 'nullable',
                                    'party_type'      => 'nullable',
                                    'vch_no'          => 'nullable',
                                    'payment_status'  => 'nullable',
                                    'payment_mode'    => 'nullable',
                                    'add'             => 'nullable',
                                    'current_km'      => 'nullable',
                                    'fuel_fill_date'  => 'nullable',
                                    'fuel_rate'       => 'nullable',
                                    'fuel_amt'        => 'nullable',
                                    'vch_avg'         => 'nullable',
                                    'fuel_qty'        => 'nullable',
                                    'next_fill'       => 'nullable',
                                 ]);
        $data  = $this->pay_validate($request,$data); 
        $data['expanses_amt'] = $request->fuel_amt;
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        Exp_detail::create($data);
        return redirect('expanses'); 

       }else if($request->party_type == 'TRIP'){
        $data = $this->validate($request,[ 
                                    'party_name'      => 'nullable',
                                    'party_type'      => 'nullable',
                                    'vch_no'          => 'nullable',
                                    'payment_status'  => 'nullable',
                                    'payment_mode'    => 'nullable',
                                    'add'             => 'nullable'
                                 ]);
        $data  = $this->pay_validate($request,$data);    
        $data['vch_no']     = $request->vch_no1;
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        $exp_amt     = $request->exp_amt;
        $exp_name    = $request->exp_name;
        $exp_des     = $request->exp_des;
        $count = count($exp_name);
        $x =0;
        $amt = 0;
         while ($x < $count) {
             $amt =$amt + $request->exp_amt[$x]; 
             $x++;
         }
         $data['expanses_amt'] = $amt;
        $request_id = Exp_detail::create($data)->id;

        $exp_amt1     = $request->exp_amt;
        $exp_name1    = $request->exp_name;
        $exp_des1     = $request->exp_des;
        $count = count($exp_name1);
        $x =0;
        $data1 = array();

        while($x < $count){
            $data1['exp_name']      = $exp_name1[$x];
            $data1['exp_amt']       = $exp_amt1[$x];
            $data1['exp_des']       = $exp_des1[$x];
            $data1['request_id']    = $request_id;
            Exp_Trip_detail::create($data1);
             $x++; 
        }
        return redirect('expanses');  

       }else{
       $data = $this->validate($request,[
                                    'party_name'      => 'nullable',
                                    'party_type'      => 'nullable',
                                    'vch_no'          => 'nullable',
                                    'payment_status'  => 'nullable',
                                    'payment_mode'    => 'nullable',
                                    'expanses_qty'    => 'nullable',
                                    'expanses_amt'    => 'nullable',
                                    'expanses_remark' => 'nullable',
                                    'add'             => 'nullable'
                                 ]);
        $data  = $this->pay_validate($request,$data); 
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        Exp_detail::create($data);   
        return redirect('expanses');  

       }
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
