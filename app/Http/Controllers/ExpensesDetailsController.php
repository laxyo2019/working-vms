<?php

namespace App\Http\Controllers;

use App\Models\InsuranceDetails;
use App\Models\FitnessDetails;
use App\Models\RoadtaxDetails;
use Illuminate\Http\Request;
use App\Models\StatePermit;
use App\Models\PUCDetails;
use App\Models\RcDetails;
use App\User;
use Auth;
use DB;
class ExpensesDetailsController extends Controller
{
    public function index()
    {
        $owner = Auth::user()->id;
        $account_user_id = get_fleet_users($owner)->pluck('id');
        $users = collect(User::with('vechicles.puc','vechicles.rc','vechicles.fitness','vechicles.permit','vechicles.insurance','vechicles.roadtax')->whereIn('id',$account_user_id)->get());
        $vechicles =  $users->pluck('vechicles');

         return view('expenses.expenses_details.expensesdetails',compact('users'));
    }
    public function expenses_details(Request $request)
    {
       return $request->all();
    }
    public function store(Request $request)
    {
        //
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
        //
    }
}
