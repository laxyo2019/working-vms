<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\Models\Expenses\Party;
use App\Models\Expenses\ExpensesType;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Party::with('city')->get();
        // dd($data);
        return view('expenses.party_info.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("create");
        $fleet_code = session('fleet_code');
        $exp_type  = ExpensesType::all();
        $state  = State::where('fleet_code',$fleet_code)->get();
       return view('expenses.party_info.create',compact('state','exp_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->form_data($request);
       $data['party_name'] = strtoupper($data['party_name']);
       $data['party_type'] = strtoupper($data['party_type']);
        Party::create($data);
        return redirect()->route('party.index');
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
        $data = Party::find($id);
        $fleet_code = session('fleet_code');
        $exp_type  = ExpensesType::all();
        $state  = State::where('fleet_code',$fleet_code)->get();
        return view('expenses.party_info.edit',compact('data','state','exp_type'));
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
        $data = $this->form_data($request);
        $data['party_name'] = strtoupper($data['party_name']);
        $data['party_type'] = strtoupper($data['party_type']);
        Party::where('id',$id)->update($data);
        return redirect()->route('party.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Party::destroy($id);
        return redirect()->route('party.index');
    }

    public function form_data($request){

        $vdata = $request->validate([
                      'party_name'      => 'required|unique:party_details',
                      'phone'           => 'required|min:10|max:10',
                      'party_type'      => 'nullable',
                      'landline_no'     => 'nullable',
                      'alt_mobile_no'   => 'nullable|min:10',
                      'party_website'   => 'nullable',               
                      'party_email'     => 'nullable',
                      'party_state'     => 'nullable',
                      'party_city'      => 'nullable',
                      'party_add'       => 'nullable',
                      // 'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                ]);
        return $vdata;
    }
}
