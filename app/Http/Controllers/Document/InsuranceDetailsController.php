<?php

namespace App\Http\Controllers\Document;

use App\Exports\InsuranceDetailsExport;
use App\Imports\InsuranceDetailsImport;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\InsuranceCompany;
use App\Models\InsuranceDetails;
use Illuminate\Http\Request;
use App\vehicle_master;
use Session;
use File;
use Auth;

class InsuranceDetailsController extends Controller
{
   
    public function index()
    {
        $fleet_code = session('fleet_code');

        $insurance  = InsuranceDetails::where('fleet_code',$fleet_code)->get();        
        return view('document.insurance.show',compact('insurance'));
    }
   
    public function create()
    {
        $fleet_code  = session('fleet_code');
        $vehicle     = get_vehicle()->get();
        $agent       = get_agent()->get();
        $ins_company = InsuranceCompany::where('fleet_code',$fleet_code)->get();
        return view('document.insurance.create',compact('vehicle','agent','ins_company'));
    }
   
    public function store(Request $request)
    {   
        $data = $request->validate([    "insured_name"      =>'nullable',
                                        "vch_id"            =>'required',
                                        "ins_comp"          =>'required',
                                        'ins_type'          =>'nullable',
                                        "ins_policy_no"     =>'required',
                                        'agent_id'          => 'nullable',
                                        "ins_total_amt"     =>'nullable',
                                        "ins_pre_policy_no" =>'nullable',
                                        "ncb_discount"      =>'nullable',
                                        "hypothecation_agreement" =>'nullable',
                                        "valid_from"        =>'required',
                                        "valid_till"        =>'required',
                                        "payment_mode"      =>'required|not_in:0',
                                        "engine_no"         =>'nullable',
                                        "chassis_no"        =>'nullable',
                                        "manufacture_year"  =>'nullable',
                                        "type_of_body"      =>'nullable',
                                        "type_of_fuel"      =>'nullable',
                                        "seating_capacity"  =>'nullable',
                                        "cubic_capacity"    =>'nullable',
                                        'doc_file'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
                                     
                                     ]);
       
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        InsuranceDetails::create($vdata);
        return redirect('insurance');
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $data       = InsuranceDetails::find($id);
        $vehicle    = get_vehicle()->get();
        $agent      = get_agent()->get();
        $ins_company= InsuranceCompany::where('fleet_code',$fleet_code)->get();
       return view('document.insurance.edit',compact('vehicle','data','agent','ins_company'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([ "insured_name"      =>'nullable',
                                        "vch_id"            =>'required',
                                        "ins_comp"          =>'required',
                                        'ins_type'          =>'nullable',
                                        "ins_policy_no"     =>'required',
                                        'agent_id'          => 'nullable',
                                        "ins_total_amt"     =>'nullable',
                                        "ins_pre_policy_no" =>'nullable',
                                        "ncb_discount"      =>'nullable',
                                        "hypothecation_agreement" =>'nullable',
                                        "valid_from"        =>'required',
                                        "valid_till"        =>'required',
                                        "payment_mode"      =>'required|not_in:0',
                                        "engine_no"         =>'nullable',
                                        "chassis_no"        =>'nullable',
                                        "manufacture_year"  =>'nullable',
                                        "type_of_body"      =>'nullable',
                                        "type_of_fuel"      =>'nullable',
                                        "seating_capacity"  =>'nullable',
                                        "cubic_capacity"    =>'nullable',
                                        'doc_file'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
                                     ]);
    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data,$id);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;
        $old_data = InsuranceDetails::find($id);
        InsuranceDetails::where('id',$id)->update($vdata);
        $fleet_code = session('fleet_code');
        if($old_data->doc_file != null && $old_data->doc_file != $vdata['doc_file'] && $vdata['doc_file']!=null){
            Storage::delete('public/'.$fleet_code.'/Document/Insurance/'.$old_data->doc_file);
        }
        return redirect('insurance');
    }

    public function destroy($id)
    {
        $old_data = InsuranceDetails::find($id);
        InsuranceDetails::where('id',$id)->delete();
        $fleet_code = session('fleet_code');

        if(!empty($old_data->doc_file)){
            Storage::delete('public/'.$fleet_code.'/Document/Insurance/'.$old_data->doc_file);
        }
        return redirect('insurance');
    }

     public function export() 
    {
        return Excel::download(new InsuranceDetailsExport, 'InsuranceDetails.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new InsuranceDetailsImport,request()->file('file'));
        
        return redirect('insurance');
    }

     public function download() {
        $file_path =
        public_path('demo_files/Demo_Insurance.xlsx');

        return response()->download($file_path);
    }

    public function store_image(Request $request,$vdata,$id='')
    {   
        $fleet_code = session('fleet_code');
        if($request->hasFile('doc_file')) {
        
            $filename = $request->file('doc_file')->getClientOriginalName();
            $extension = $request->file('doc_file')->getClientOriginalExtension();
            $fileNameToStore = $request->payment_mode.'_'.$filename;

            $chk_path = storage_path('app/public/'.$fleet_code.'/Document/Insurance/');
                           
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('doc_file')->storeAs('public/'.$fleet_code.'/Document/Insurance/', $fileNameToStore);
            $vdata['doc_file'] = $fileNameToStore;    
        }
        
       if(!empty($id) && empty($request->hasFile('doc_file'))){
           $old_data =InsuranceDetails::where('id',$id)->first();

            if($request->image == null) {
                $vdata['doc_file'] = $old_data->doc_file;    
            }
       }
    
        return $vdata;
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

    public function getDetails(Request $request){
        $id = $request->id;
        $data  = vehicle_master::find($id);
        return json_encode($data);

    }
}
