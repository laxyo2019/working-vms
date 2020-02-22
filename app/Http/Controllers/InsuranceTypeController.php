<?php

namespace App\Http\Controllers;

use App\Imports\InsuranceTypeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\InsuranceCompany;
use App\Exports\InsurancExport;
use App\Models\InsuranceType;
use Illuminate\Http\Request;
use Session;
use Auth;

class InsuranceTypeController extends Controller
{
    public function index()
    {   
        $fleet_code = session('fleet_code');
        $ins_types  = InsuranceType::where('fleet_code',$fleet_code)->with('ins_comp')->get();
        
        return view('InsuranceType.index',compact('ins_types'));
    }
    public function create()
    {
        $fleet_code =session('fleet_code');
        $companies  = InsuranceCompany::where('fleet_code',$fleet_code)->get();
        return view('InsuranceType.create',compact('companies'));
    }
    public function store(Request $request)
    {
       
       $data  = $request->validate([ 'ins_id'      => 'required',
                                      'type_name'  => 'required',
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        InsuranceType::create($data);
       return redirect('insurance_type');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
       InsuranceType::destroy($id);
       return redirect('insurance_type');
    }
    public function import(Request $request) 
    {    
        $data = Excel::import(new InsuranceTypeImport,request()->file('file'));
        return redirect('insurance_type');
    }
}
