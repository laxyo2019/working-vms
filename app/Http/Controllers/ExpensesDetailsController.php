<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Models\PUCDetails;
use App\Models\RcDetails;
use App\Models\FitnessDetails;
use App\Models\StatePermit;
use App\Models\RoadtaxDetails;
use App\Models\InsuranceDetails;
class ExpensesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner = Auth::user()->id;
        $account_user_id = get_fleet_users($owner)->pluck('id');

       // $users = collect(User::with('vechicles')->whereIn('id',$account_user_id)->get());

        // $vch_ids =  $users->map(function($e){
        //         return collect($e->vechicles)->map(function($a) {
        //             return $a->id;
        //         });
        //     });

        $users = collect(User::with('vechicles.puc','vechicles.rc','vechicles.fitness','vechicles.permit','vechicles.insurance','vechicles.roadtax')->whereIn('id',$account_user_id)->get());

          // return $users;
        $vechicles =  $users->pluck('vechicles');

        // dd($users);



         $vch_amount =  $users->map(function($e){        
                return collect($e->vechicles)->map(function($a) {
                    return $a->id." ".(($a->puc !=null ? $a->puc->puc_amt : '0') + ($a->rc !=null ? $a->rc->rc_amt : '0') + ($a->fitness !=null ? $a->fitness->fitness_amt : '0') + ($a->permit !=null ? $a->permit->permit_amt : '0') + ($a->insurance !=null ? $a->insurance->ins_total_amt : '0') + ($a->roadtax !=null ? $a->roadtax->roadtax_amt : '0'));
                });
            });

          return $vch_amount;
           foreach ($vch_amount as $key => $value) {
                return   explo(" ", $value);

            } 

       //  $array = array();
       // foreach ($vch_ids as $value) {
       //      $array[] = $value;
       // }
        
        // return $vch_ids;


      //   $no = count($details_d);
      //   $i =0;
      //   foreach($details_d as $data ){
      //   $d_Id[] = $data->id;
      //   }
      // // For All Vehicles Expenses Calculation
      //   $puc_exp      = PUCDetails::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(valid_till,'%y'))"), date('Y'))->with('vehicle')->get();
      //   $rc_exp       = RcDetails::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(valid_till,'%y'))"), date('Y'))->with('vehicle')->get();
      //   $fitness_exp  = FitnessDetails::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(valid_till,'%y'))"), date('Y'))->with('vehicle')->get();
      //   $tax_exp      = RoadtaxDetails::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(valid_till,'%y'))"), date('Y'))->with('vehicle')->get();
      //   $ins_exp      = InsuranceDetails::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(valid_till,'%y'))"), date('Y'))->with('vehicle')->get();
      //   $permit_exp   = StatePermit::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(valid_till,'%y'))"), date('Y'))->with('vehicle')->get();
    // End All Vehicles Expenses Calculation

        // return $puc_exp;
         return view('expenses.expenses_details.expensesdetails',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function expenses_details(Request $request)
    {
       return $request->all();
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
}
