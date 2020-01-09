<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_master;
use App\Models\Expenses\Expense_Entry;
use App\Models\Expenses\Expense_Entry_Item;
use App\Models\Expenses\Expense_payment;
use App\Models\Expenses\Expense_payment_item;
use Session;
use Auth;

class ExpensesPaymentEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleet_code = session('fleet_code');

        $Expense_payment = Expense_payment_item::where('fleet_code',$fleet_code)->with('vehicle')->orderBy('id', 'DESC')->get();
        // dd($Expense_payment);
        return view('expenses.expenses_payment_entry.index',compact('Expense_payment'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fleet_code = session('fleet_code');
        $data =  Expense_Entry::select('job_by')->where('fleet_code',$fleet_code)->groupBy('job_by')
            ->get();
        $Expense_payment = Expense_payment::where('fleet_code',$fleet_code)->orderBy('id', 'DESC')->get();
        
        $res = count($Expense_payment);
        if($res == 0){
            $no = 1000001;
        }
        else{
            $no = $Expense_payment[0]->entry_no+1;
        }
        $date =date("Y-m-d", time());
        return view('expenses.expenses_payment_entry.create',compact('data','no','date'));    
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
                            'entry_no'                  =>'required',
                            'entry_date'                =>'required',
                            'job_done_by'               =>'required',
                            'total_balance_amount'      =>'nullable',
                            'total_paid_amount'         =>'nullable',
                            'total_remaining_amount'    =>'nullable',
                            'paid_by'                   =>'nullable',
                            'payment_mode'              =>'required|not_in:0',
                            'remark'                    =>'nullable'
                    ]);

        $data = $this->pay_validate1($request,$data);
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        $last_id = Expense_payment::create($data)->id;
        $bill_no             = $request->bill_no;
        $bill_date           = $request->bill_date;
        $entry_date          = $request->entry_date;
        $vch_id              = $request->vch_id;
        $job_by              = $request->job_by;
        $paid_by             = $request->paid_by;
        $expense_type_id     = $request->expense_type_id;
        $qty                 = $request->qty;
        $rate                = $request->rate;
        $amt                 = $request->amt;
        $service_tax         = $request->service_tax;
        $service_tax_amt_t   = $request->service_tax_amt_t;
        $vat_tax             = $request->vat_tax;
        $vat_tax_amt_t       = $request->vat_tax_amt_t;
        $net_amt             = $request->net_amt;
        $paid_amt            = $request->paid_amt;
        $remaining_amt       = $request->remaining_amt;

        $count = count($qty);
        $x = 0;
        $data1 = array();
        while($x < $count) {
            $data1['fleet_code']         = session('fleet_code');
            $data1['created_by']         = Auth::user()->id;
            $data1['bill_no']            = $bill_no[$x];
            $data1['bill_date']          = $bill_date[$x];
            $data1['payment_date']       = $entry_date;
            $data1['request_id']         = $last_id ;
            $data1['vch_id']             = $vch_id[$x];
            $data1['job_by']             = $job_by[$x];
            $data1['paid_by']            = $paid_by;
            $data1['expense_type_id']    = $request->expense_type_id[$x];
            $data1['qty']                = $qty[$x];
            $data1['rate']               = $rate[$x]; 
            $data1['amt']                = $amt[$x];
            $data1['service_tax']        = $service_tax[$x];
            $data1['service_tax_amt_t']  = $service_tax_amt_t[$x];
            $data1['vat_tax']            = $vat_tax[$x];
            $data1['vat_tax_amt_t']      = $vat_tax_amt_t[$x];
            $data1['net_amt']            = $net_amt[$x];
            $data1['paid_amt']           = $paid_amt[$x];
            $data1['remaining_amt']      = $remaining_amt[$x];
            
           Expense_payment_item::create($data1);
             $x++;  
         }
        return redirect('expanses_payment_entry');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("this is from show function");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $jobs =  Expense_Entry::select('job_by')->where('fleet_code',$fleet_code)->groupBy('job_by')
            ->get();
        $data = Expense_payment_item::where('fleet_code',$fleet_code)->where('id',$id)->with('payment_detail','vehicle')->first();
        // dd($data);
        $result = $data->request_id;
        $records = Expense_payment_item::where('fleet_code',$fleet_code)->where('request_id',$result)->with('vehicle')->get();
        
        return view('expenses.expenses_payment_entry.edit',compact('id','data','records','jobs'));
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
       // dd($request->all());
       // dd($id);
        $fleet_code = session('fleet_code');
        Expense_payment::where('fleet_code',$fleet_code)->where('id',$request->request_id)
                        ->update([
                            'total_balance_amount'      => $request->total_balance_amount,
                            'total_paid_amount'         => $request->total_paid_amount,
                            'total_remaining_amount'    => $request->total_remaining_amount,
                        ]);

        $payment_date       = $request->entry_date;
        $ids                = $request->id;
        $request_id         = $request->request_id;
        $bill_no            = $request->bill_no;
        $bill_date          = $request->bill_date;
        $vch_id             = $request->vch_id;
        $job_by             = $request->job_by;
        $paid_by            = $request->paid_by;
        $expense_type_id    = $request->expense_type_id;
        $qty                = $request->qty;
        $rate               = $request->rate;
        $amt                = $request->amt;
        $service_tax        = $request->service_tax;
        $service_tax_amt_t = $request->service_tax_amt_t;
        $vat_tax            = $request->vat_tax;
        $vat_tax_amt_t      = $request->vat_tax_amt_t;
        $net_amt            = $request->net_amt;
        $paid_amt           = $request->paid_amt;
        $remaining_amt      = $request->remaining_amt;

        $count = count($qty);
        $x = 0;

        while($x < $count) {
            if($ids[$x] == $id){
            $data1['fleet_code']         = session('fleet_code');
            $data1['created_by']         = Auth::user()->id;
            $data1['bill_no']            = $bill_no[$x];
            $data1['bill_date']          = $bill_date[$x];
            $data1['payment_date']       = $payment_date;
            $data1['request_id']         = $request_id ;
            $data1['vch_id']             = $vch_id[$x];
            $data1['job_by']             = $job_by[$x];
            $data1['paid_by']            = $paid_by;
            $data1['expense_type_id']    = $request->expense_type_id[$x];
            $data1['qty']                = $qty[$x];
            $data1['rate']               = $rate[$x]; 
            $data1['amt']                = $amt[$x];
            $data1['service_tax']        = $service_tax[$x];
            $data1['service_tax_amt_t']  = $service_tax_amt_t[$x];
            $data1['vat_tax']            = $vat_tax[$x];
            $data1['vat_tax_amt_t']      = $vat_tax_amt_t[$x];
            $data1['net_amt']            = $net_amt[$x];
            $data1['paid_amt']           = $paid_amt[$x];
            $data1['remaining_amt']      = $remaining_amt[$x];
            
           Expense_payment_item::where('id',$id)->update($data1);
            }
             $x++;  
         }
         return redirect('expanses_payment_entry');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fleet_code = session('fleet_code');
        $data = Expense_payment_item::where('fleet_code',$fleet_code)->where('id',$id)->first()->request_id;
        $result = Expense_payment_item::where('fleet_code',$fleet_code)->where('request_id',$data)->count();
        if($result > 1){
        Expense_payment_item::where('fleet_code',$fleet_code)->where('id',$id)->delete();
        return redirect('expanses_payment_entry');
        }else{
            Expense_payment_item::where('fleet_code',$fleet_code)->where('id',$id)->delete();
            Expense_payment::where('fleet_code',$fleet_code)->where('id',$data)->delete();
        return redirect('expanses_payment_entry');
        }
        
    }
    public function get_details(Request $request)
    { 
        $name = $request->job_by;
        $fleet_code = session('fleet_code');
        $Data = Expense_Entry_Item::where('fleet_code',$fleet_code)
        ->Where('job_by', $name)->with('vehicle','bill')->get();
        return $Data;
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
