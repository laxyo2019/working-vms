<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KMupdateExport;
use App\Imports\KMupdateimport;
use Illuminate\Http\Request;
use App\Models\KMupdate;
use Session;
use Auth;


class KMupdateController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $kilometer  = KMupdate::where('fleet_code',$fleet_code)->get();
        return view('kmupdate.show',compact('kilometer'));
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = get_vehicle()->get();
        return view('kmupdate.create',compact('vehicle'));
    }

   
    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');
        $data       = $request->validate([
                                   "vch_id"  => "required",
                                   "reading" => "required|numeric",
                                   'date'    =>'required|date|date_format:Y-m-d|before:tomorrow'
                                ]);
        $data['fleet_code']  = $fleet_code;
        $data['created_by']  = Auth::user()->id;
        KMupdate::create($data);
        return redirect('kmupdate');
        
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = get_vehicle()->get();
        $data       = KMupdate::find($id);
        return view('kmupdate.edit',compact('vehicle','data')); 
    }

  
    public function update(Request $request, $id)
    {
         $fleet_code = session('fleet_code');
        $data = $request->validate([
                                   "vch_id"     => "required",
                                   "reading"    => "required|numeric",
                                   'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                ]);
        $data['fleet_code'] = $fleet_code;
        $data['created_by'] = Auth::user()->id;
        KMupdate::where('id',$id)->update($data);
        return redirect('kmupdate');
    }

    
    public function destroy($id)
    {
        KMupdate::where('id',$id)->delete();
        return redirect('kmupdate');
    }

    public function export() 
    {
        return Excel::download(new KMupdateExport, 'KMupdate.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new KMupdateimport,request()->file('file'));
        
        return redirect('kmupdate');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_Kmupdate.xlsx');
    return response()->download($file_path);
    }
}
