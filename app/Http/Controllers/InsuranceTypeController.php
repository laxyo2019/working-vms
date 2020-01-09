<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Models\InsuranceType;
use App\Exports\InsurancExport;
use App\Imports\InsuranceTypeImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Session;

class InsuranceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $fleet_code = session('fleet_code');
        $ins_types = InsuranceType::where('fleet_code',$fleet_code)->with('ins_comp')->get();
        
        return view('InsuranceType.index',compact('ins_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fleet_code =session('fleet_code');
        $companies = InsuranceCompany::where('fleet_code',$fleet_code)->get();
        return view('InsuranceType.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $data  = $request->validate([ 'ins_id'   => 'required',
                                      'type_name'  => 'required',
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        InsuranceType::create($data);
       return redirect('insurance_type');
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
       InsuranceType::destroy($id);
       return redirect('insurance_type');
    }
    public function import(Request $request) 
    {    
        $data = Excel::import(new InsuranceTypeImport,request()->file('file'));
        return redirect('insurance_type');
    }
}
