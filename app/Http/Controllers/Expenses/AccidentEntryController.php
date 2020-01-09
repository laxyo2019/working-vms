<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expenses\Accident;
use App\vehicle_master;
use App\City;
use Session;
use File;
use Auth;

class AccidentEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleet_code = session('fleet_code');
        $accidents = Accident::where('fleet_code',$fleet_code)->with('vehicle','city')->get();
        //dd($accidents);
        return view('expenses.accident_entry.index',compact('accidents'));    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $fleet_code = session('fleet_code');
        $cities     = City::where('fleet_code',$fleet_code)->OrderBy('city_name')->get();
        $res1       = Accident::where('fleet_code',$fleet_code)->get();
        $vehicles   = vehicle_master::where('fleet_code',$fleet_code)->get();
        $res = count($res1);
        if($res == 0){
            $no = 1000001;
        }
        else{
            $no = $res1[0]->accident_no+1;
        }
        if($res == 0){
            $case = 100210107;
        }
        else{
            $case = $res1[0]->case_no+1;
        }
         $date =date("Y-m-d", time());
        return view('expenses.accident_entry.create',compact('cities','no','date','case','vehicles'));    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([ 'accident_no'             => 'required',
                                     'entry_date'              => 'nullable',   
                                     "case_no"                 => 'required',
                                     "vehicle_no"              => 'required',
                                     "accident_date"           => 'required',
                                     "accident_city"           => 'required|not_in:0',
                                     'address'                 => 'nullable',
                                     "driver_name"             => 'nullable',
                                     "total_damage"            => 'nullable',   
                                     "paid_by"                 => 'nullable',
                                     "total_claim_amount"      => 'nullable',
                                     "claim_date"              => 'nullable',
                                     "net_damage"              => 'nullable',
                                     "paid_date"               => 'nullable',
                                     "remarks"                 => 'nullable',
                                     'doc_file'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
        
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        Accident::create($vdata);
        return redirect('accident_entry');
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
       $fleet_code = session('fleet_code');
       $accidents = Accident::where('fleet_code',$fleet_code)->where('id',$id)->with('vehicle','city')->first();
       $cities     = City::where('fleet_code',$fleet_code)->OrderBy('city_name')->get();
       $vehicles   = vehicle_master::where('fleet_code',$fleet_code)->get();
       // dd($accidents->accident_no);
        return view('expenses.accident_entry.edit',compact('cities','accidents','vehicles')); 
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

       $data = $request->validate([ 'accident_no'             => 'required',
                                     'entry_date'              => 'nullable',   
                                     "case_no"                 => 'required',
                                     "vehicle_no"              => 'required',
                                     "accident_date"           => 'required',
                                     "accident_city"           => 'required|not_in:0',
                                     'address'                 => 'nullable',
                                     "driver_name"             => 'nullable',
                                     "total_damage"            => 'nullable',   
                                     "paid_by"                 => 'nullable',
                                     "total_claim_amount"      => 'nullable',
                                     "claim_date"              => 'nullable',
                                     "net_damage"              => 'nullable',
                                     "paid_date"               => 'nullable',
                                     "remarks"                 => 'nullable',
                                     'doc_file'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
        
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        Accident::where('id',$id)->update($vdata);
        return redirect('accident_entry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $fleet_code = session('fleet_code');
        Accident::where('fleet_code',$fleet_code)->find($id)->delete();
        return redirect('accident_entry');
    }
    public function store_image(Request $request,$vdata,$id='')
    {   
        $fleet_code = session('fleet_code');
        if($request->hasFile('doc_file')) {
        
            $filename = $request->file('doc_file')->getClientOriginalName();
            $extension = $request->file('doc_file')->getClientOriginalExtension();
            $random =rand(100000, 999999);
            $fileNameToStore = $random.'_'.$filename;

            $chk_path = storage_path('app/public/'.$fleet_code.'/Accident');
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('doc_file')->storeAs('public/'.$fleet_code.'/Accident/', $fileNameToStore);
            $vdata['doc_file'] = $fileNameToStore;    
        }
        
       if(empty($request->hasFile('doc_file')) && !empty($id)){
           $old_data =Accident::where('id',$id)->first();

            if($request->image == null) {
                $vdata['doc_file'] = $old_data->doc_file;    
            }
       }
    
        return $vdata;
    }
}
