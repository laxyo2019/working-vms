<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_master;
use App\Models\Expenses\Expense_Entry;
use App\Models\Expenses\Expense_Entry_Item;
use Session;
use Auth;

class ExpensesEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $fleet_code = session('fleet_code');
        $expense_entries = Expense_Entry::where('fleet_code',$fleet_code)->with('vehicle')->orderBy('id', 'DESC')->get();
       return view('expenses.expenses_entry.index',compact('expense_entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        session::forget('data');        
        Session::forget('ids');
        $fleet_code = session('fleet_code');
        $expense_entry = Expense_Entry::where('fleet_code',$fleet_code)->orderBy('id', 'DESC')->get();
        
        $res = count($expense_entry);
        if($res == 0){
            $no = 1000001;
            $bill_no = 1000118;
        }
        else{
            $no = $expense_entry[0]->serial_no+1;
            $bill_no = $expense_entry[0]->bill_no+1;
        }
        $date =date("Y-m-d", time());
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('expenses.expenses_entry.create',compact('vehicle','no','date','bill_no'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       
      $data = $request->validate([
                            'serial_no'         =>'required',
                            'serial_date'       =>'required',
                            'job_by'            =>'required|string',
                            'address'           =>'nullable',
                            'contact_no'        =>'nullable',
                            'tin_no'            =>'nullable',
                            'bill_no'           =>'nullable',
                            'bill_date'         =>'nullable',
                            'expense_type'      =>'required|not_in:0',
                            //'vehicle_no'        =>'required|not_in:0',
                            'total_qty'         =>'nullable',
                            'total_amount'      =>'nullable',
                            'service_tax_amount'=>'nullable',
                            'net_amt_sum'       =>'nullable',
                            'vat_tax_amount'    =>'nullable',
                            'payment_mode'      =>'required|not_in:0',
                            'remark'            =>'nullable'
                    ]);

        $data = $this->pay_validate1($request,$data);
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        $last_id = Expense_Entry::create($data)->id;

        $expense_details     = $request->expense_details;
       
        $vehicle_id          = $request->vehicle_id;
        $expense_type_id     = $request->expense_type_id;
        $qty                 = $request->qty;
        $rate                = $request->rate;
        $amt                 = $request->amt;
        $service_tax         = $request->service_tax;
        $service_tax_amt_t   = $request->service_tax_amt_t;
        $vat_tax             = $request->vat_tax;
        $vat_tax_amt_t       = $request->vat_tax_amt_t;
        $net_amt             = $request->net_amt;

        $count = count($qty);
        $x = 0;
        $data = array();
        $info = '';
        while($x < $count) {
            $data['entry_id']           =  $last_id ;
            $data['expense_details']    = $expense_details[$x];
            $data['job_by']             = $request->job_by;
            $data['serial_no']          = $request->serial_no;
            $data['serial_date']        = $request->serial_date;
            $data['fleet_code']         = session('fleet_code');
            $data['vehicle_id']         = $vehicle_id[$x];
            $data['expense_type_id']    = $expense_type_id[$x] ;
            $data['qty']                = $qty[$x];
            $data['rate']               = $rate[$x]; 
            $data['amt']                = $amt[$x];
            $data['service_tax']        = $service_tax[$x];
            $data['service_tax_amt_t']  = $service_tax_amt_t[$x];
            $data['vat_tax']            = $vat_tax[$x];
            $data['vat_tax_amt_t']      = $vat_tax_amt_t[$x];
            $data['net_amt']            = $net_amt[$x];
            
           Expense_Entry_Item::create($data);
             $x++; 
            $info = 'done'; 
         }
         if(!empty($info)){
            Session::forget('data');
            Session::forget('ids'); 
         }
        return redirect('expanses_entry');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('this is show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::forget('data');
        Session::forget('ids'); 
        $fleet_code  = session('fleet_code');
       $expense_entries = Expense_Entry::find($id);
       $vehicles    = vehicle_master::where('fleet_code',$fleet_code)->get();
       //dd($vehicle);
       $expense_entry_item = Expense_Entry_Item::where('entry_id',$id)->with('vehicle')->get();
       //dd($expense_entry_item);
       foreach ($expense_entry_item as $Data) {
            $vehicle = vehicle_master::where('id',$Data->vehicle_id)->first();
            
            Session::push('ids.'.$Data->id,$Data->id);
            Session::put('edit_id.'.$Data->id,$Data->id);

            $data1['item_id']           = $Data->id;
            $data1['id']                = $Data->id;
            $data1['entry_id']          = $Data->entry_id;
            $data1['expense_details']   = $Data->expense_details;
            $data1['vehicle_id']        = $Data->vehicle_id;
            $data1['vehicle_no']        = $vehicle->vch_no;
            $data1['expense_type_id']   = $Data->expense_type_id;
            $data1['expense_type']      = $Data->expense_type_id == 1 ? "General Expense" : ($Data->expense_type_id == 2 ? "OLD TYRE" : ($Data->expense_type_id == 3 ? "REMOLDED TYRE" : ($Data->expense_type_id == 4 ? "REJECTED TYRE" :"CUT REPAIRED TYRE")));
           
            $data1['qty']               = $Data->qty;
            $data1['rate']              = $Data->rate;
            $data1['amt']               = $Data->amt;
            $data1['service_tax']       = $Data->service_tax;
            $data1['service_tax_amt'] = $Data->service_tax_amt_t;
            $data1['vat_tax']           = $Data->vat_tax;
            $data1['vat_tax_amt']     = $Data->vat_tax_amt_t;
            $data1['net_amt']           = $Data->net_amt;

            session()->push('data.'.$Data->id, $data1);  
        }
        
        return view('expenses.expenses_entry.edit',compact('expense_entries','vehicles'));
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
        //dd($request->all());
        $data = $request->validate([
                            'serial_no'         =>'required',
                            'serial_date'       =>'required',
                            'job_by'            =>'required|string',
                            'address'           =>'nullable',
                            'contact_no'        =>'nullable',
                            'tin_no'            =>'nullable',
                            'bill_no'           =>'nullable',
                            'bill_date'         =>'nullable',
                            //'expense_type'      =>'nullable|not_in:0',
                            //'vehicle_no'        =>'nullable|not_in:0',
                            'total_qty'         =>'nullable',
                            'total_amount'      =>'nullable',
                            'service_tax_amount'=>'nullable',
                            'net_amt_sum'       =>'nullable',
                            'vat_tax_amount'    =>'nullable',
                            'payment_mode'      =>'required|not_in:0',
                            'remark'            =>'nullable'
                    ]);
        $data = $this->pay_validate1($request,$data);
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;

        Expense_Entry::where('id',$id)->update($data);

        $expense_details     = $request->expense_details;
        $vehicle_id          = $request->vehicle_id;
        $expense_type_id     = $request->expense_type_id;
        $qty                 = $request->qty;
        $rate                = $request->rate;
        $amt                 = $request->amt;
        $service_tax         = $request->service_tax;
        $service_tax_amt_t   = $request->service_tax_amt_t;
        $vat_tax             = $request->vat_tax;
        $vat_tax_amt_t       = $request->vat_tax_amt_t;
        $net_amt             = $request->net_amt;
        $count = count($qty);
        $x = 0;
        $data = array();
        $info = '';
        while($x < $count) {
           
            $data['entry_id']           =  $id ;
            $data['expense_details']    = $expense_details[$x];
            $data['vehicle_id']         = $vehicle_id[$x];
            $data['expense_type_id']    =  $expense_type_id[$x] ;
            $data['qty']                = $qty[$x];
            $data['rate']               = $rate[$x]; 
            $data['amt']                = $amt[$x];
            $data['service_tax']        = $service_tax[$x];
            $data['service_tax_amt_t']  = $service_tax_amt_t[$x];
            $data['vat_tax']            = $vat_tax[$x];
            $data['vat_tax_amt_t']      = $vat_tax_amt_t[$x];
            $data['net_amt']            = $net_amt[$x];
            
             if($request->item_id[$x] == null) { 
                Expense_Entry_Item::create($data);
                
                }else{
                    
                Expense_Entry_Item::where('id',$request->item_id)->update($data);  
                }
              $x++; 
                $info = 'done';
             }
        
         return redirect('expanses_entry'); 
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
    public function save_session(Request $request)
    {
        $fleet_code = session('fleet_code');
        $expense_type = $request->expense_type;
        $expense_details =$request->expense_details;
        $vehicle_no = $request->vehicle_no;
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->where('id',$vehicle_no)->first();
               Session::push('ids.'.$vehicle_no,$vehicle_no);
            $data1['item_id']         = '';
            $data1['id']              = $vehicle_no;
            $data1['vehicle_id']      = $vehicle_no;
            $data1['vehicle_no']      = $vehicle->vch_no;
            $data1['expense_details'] = $expense_details;
            $data1['expense_type_id'] = $expense_type;
            $data1['expense_type']    = $expense_type == 1 ? "General Expense" : ($expense_type == 2 ? "OLD TYRE" : ($expense_type == 3 ? "REMOLDED TYRE" : ($expense_type == 4 ? "REJECTED TYRE" :"CUT REPAIRED TYRE")));
            $data1['qty']             = '$request->expense_type' ;
            $data1['rate']            = '';
            $data1['amt']             = '';
            $data1['service_tax']     = '';
            $data1['service_tax_amt'] = '';
            $data1['vat_tax']         = '';
            $data1['net_amt']         = '';
            $data1['vat_tax_amt']     = '';
            $data1['remark']          = '';
            session()->push('data.'.$vehicle_no, $data1);
            return view('expenses.expenses_entry.expense_entry_table',compact('data')); 

    }
    public function remove_entry_session(Request $request)
    {
        $id = $request->id; 
        session::forget('data.'.$id);        
        Session::forget('ids.'.$id);
        $data = session('data');
        return view('expenses.expenses_entry.expense_entry_table',compact('data'));
    }

    public function pay_validate1(Request $request,$data)
    {  
          if($request->payment_mode == 'cheque'){                             
           $data[] = $request->validate([ "cpay_no"      => 'required|numeric',
                                         "cpay_dt"      => 'required',
                                         "cpay_bank"    => 'required|alpha',
                                         "cpay_branch"  => 'required|alpha',                                 
                                        ]);
           dd($data);
            $Vdata['pay_no']  = $request->cpay_no;
            $Vdata['pay_dt'] = $request->cpay_dt;
            $Vdata['pay_bank'] = $request->cpay_bank;
            $Vdata['pay_branch'] = $request->cpay_branch;
            $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'dd'){
                             
           $request->validate([          "dpay_no"      => 'required|numeric',
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
