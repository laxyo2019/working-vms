<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TyreCompany;
use App\Models\TyreModel;
use Session;
use Auth;

class MaterialRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        Session::forget('data');
       Session::forget('ids'); 
    
        $fleet_code = session('fleet_code');
        //$request    = MaterialRequest::where('fleet_code',$fleet_code)->get();
        return view('tyre.transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $fleet_code = session('fleet_code');
        $comp = TyreCompany::where('fleet_code',$fleet_code)->get();
        return view('tyre.transactions.create',compact('comp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    

    public function type_details(Request $request)
    {
            $id= $request->id;
            $fleet_code = session('fleet_code');
            $data =TyreCompany::where('fleet_code',$fleet_code)
                              ->where('id',$id)->with('detail')->get();
            return response()->json($data);
    }
    public function type_comp(Request $request)
    {
            $id= $request->id;
            dd($id);
            $fleet_code = session('fleet_code');
    //         $data =TyreCompany::where('fleet_code',$fleet_code)
    //                           ->where('id',$id)->with('detail')->get();
    //         return response()->json($data);
     }
}
