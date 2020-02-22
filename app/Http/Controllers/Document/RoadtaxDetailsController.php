<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Exports\RoadtaxDetailsExport;
use App\Imports\RoadtaxDetailsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RoadtaxDetails;
use Illuminate\Http\Request;
use App\vehicle_master;
use Session;
use File;
use Auth;

class RoadtaxDetailsController extends Controller
{
    
    public function index()
    {

        $fleet_code = session('fleet_code');
        $roadtax    = RoadtaxDetails::where('fleet_code',$fleet_code)->get();
        return view('document.roadtax.show',compact('roadtax'));
        
    }

   
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = get_vehicle()->get();
        $agent      = get_agent()->get();
        return view('document.roadtax.create',compact('vehicle','agent'));
    }

   
    public function store(Request $request)
    {
         $data = $request->validate([ 'vch_id'      => 'required',
                                     'agent_id'     => 'nullable',   
                                     "roadtax_amt"  => 'required|numeric',
                                     "valid_from"   => 'required',
                                     "valid_till"   => 'nullable',
                                     "expire_time"  => 'nullable',
                                     "payment_mode" => 'required|not_in:0',
                                     'roadtax_no'   => 'required',
                                     "engine_no"                =>'nullable',
                                     "chassis_no"               =>'nullable',   
                                     "manufacture_year"         =>'nullable',
                                     "type_of_body"             =>'nullable',
                                     "type_of_fuel"             =>'nullable',
                                     "seating_capacity"         =>'nullable',
                                     "cubic_capacity"           =>'nullable',
                                     "tax_type"                 =>'required',
                                     "receipt_id"               =>'required',
                                     "receipt_date"             =>'required',
                                      'doc_file'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        RoadtaxDetails::create($vdata);
        return redirect('roadtax');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = get_vehicle()->get();
        $agent      = get_agent()->get();
        $data       = RoadtaxDetails::find($id);
        return view('document.roadtax.edit',compact('vehicle','data','agent'));
    }

    
    public function update(Request $request, $id)
    {
         $data = $request->validate([ 'vch_id'      => 'required',
                                     'agent_id'     => 'nullable',   
                                     "roadtax_amt"  => 'required|numeric',
                                     "valid_from"   => 'required',
                                     "valid_till"   => 'nullable',
                                     "expire_time"  => 'nullable',
                                     "payment_mode" => 'required|not_in:0',
                                     'roadtax_no'   => 'required',
                                     "engine_no"                =>'nullable',
                                     "chassis_no"               =>'nullable',   
                                     "manufacture_year"         =>'nullable',
                                     "type_of_body"             =>'nullable',
                                     "type_of_fuel"             =>'nullable',
                                     "seating_capacity"         =>'nullable',
                                     "cubic_capacity"           =>'nullable',
                                     "tax_type"                 =>'required',
                                     "receipt_id"               =>'required',
                                     "receipt_date"             =>'required',
                                      'doc_file'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);

    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data,$id);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        RoadtaxDetails::where('id',$id)->update($vdata);
        return redirect('roadtax');
    }

    
    public function destroy($id)
    {
        RoadtaxDetails::where('id',$id)->delete();
        return redirect('roadtax');
    }

    public function export() 
    {
        return Excel::download(new RoadtaxDetailsExport, 'RoadtaxDetails.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new RoadtaxDetailsImport,request()->file('file'));
        
        return redirect('roadtax');
    }

     public function download() {
        $file_path = public_path('demo_files/Demo_RoadtaxDetails.xlsx');
        return response()->download($file_path);
    }

    public function store_image(Request $request,$vdata,$id='')
    {   
        $fleet_code = session('fleet_code');
        if($request->hasFile('doc_file')) {
        
            $filename = $request->file('doc_file')->getClientOriginalName();
            $extension = $request->file('doc_file')->getClientOriginalExtension();
            $fileNameToStore = $request->payment_mode.'_'.$filename;

            $chk_path = storage_path('app/public/'.$fleet_code.'/Document');
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('doc_file')->storeAs('public/'.$fleet_code.'/Document/', $fileNameToStore);
            $vdata['doc_file'] = $fileNameToStore;    
        }
        
       if(!empty($id) && empty($request->hasFile('doc_file'))){
           $old_data =RoadtaxDetails::where('id',$id)->first();

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
                                         "cpay_bank"    => 'required',
                                         "cpay_branch"  => 'required',                                 
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
