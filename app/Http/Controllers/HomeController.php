<?php

namespace App\Http\Controllers;

use App\Models\InsuranceDetails;
use App\Models\FitnessDetails;
use App\Models\RoadtaxDetails;
use Illuminate\Http\Request;
use App\Models\StatePermit;
use App\Models\PUCDetails;
use App\Models\RcDetails;
use Carbon\Carbon;
use Session;
use Auth;
use DB;

use App\User;
use App\Notifications\TestNotification;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()    
    {//Auth::logout();
        $acc_type  = Auth::user()->acc_type;

        if($acc_type == 'A'){
            Session::put('user_rol','admin');
            return redirect('admin');
        }
        else if($acc_type == 'C'){
            Session::put('user_rol','fleet');
          return redirect('dashboard');   
        }
        else if($acc_type == 'B'){
            Session::put('user_rol','account');
          return redirect('accountuser');   
        }
        elseif($acc_type == '') {
          Auth::logout();
          return redirect()->back()->with('error_msg',"please contact your admin");
        }
    }
    public function test_notify(){
      $today = Carbon::now()->addDays('15')->format('Y-m-d');
      $pucs  = PUCDetails::whereBetween('valid_till',[date('Y-m-d'),$today])->with('vehicle')->get();
      $rcs   = RcDetails::whereBetween('valid_till',[date('Y-m-d'),$today])->with('vehicle')->get();
      $inss  = InsuranceDetails::whereBetween('valid_till',[date('Y-m-d'),$today])->with('vehicle')->get();
      $fits  = FitnessDetails::whereBetween('valid_till',[date('Y-m-d'),$today])->with('vehicle')->get();
      $rods  = RoadtaxDetails::whereBetween('valid_till',[date('Y-m-d'),$today])->with('vehicle')->get();
      $pers  = StatePermit::whereBetween('valid_till',[date('Y-m-d'),$today])->with('vehicle')->get();
      if(count($pucs) !=0){
        foreach ($pucs as $puc) {
            $data = [
              'id' => $puc->id,
              'title' => 'PUC EXPIRE Notification',
              'message' => $puc->vehicle->vch_no,
              'date' => $puc->valid_till
            ];

            $user = User::find($puc->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
            $users->notify(new TestNotification($data));

            }
        }
      }
      if(count($rcs) !=0){
        foreach ($rcs as $rc) {
            $data = [
              'id' => $rc->id,
              'title' => 'RC EXPIRE Notification',
              'message' => $rc->vehicle->vch_no,
              'date' => $rc->valid_till
            ];

            $user = User::find($rc->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
            $users->notify(new TestNotification($data));

            }
        }
      }
      if(count($inss) !=0){
        foreach ($inss as $ins) {
            $data = [
              'id' => $ins->id,
              'title' => 'INSURANCE EXPIRE Notification',
              'message' => $ins->vehicle->vch_no,
              'date' => $ins->valid_till
            ];

            $user = User::find($ins->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
            $users->notify(new TestNotification($data));

            }
        }
      }
      if(count($fits) !=0){
        foreach ($fits as $fit) {
            $data = [
              'id' => $fit->id,
              'title' => 'FITNESS EXPIRE Notification',
              'message' => $fit->vehicle->vch_no,
              'date' => $fit->valid_till
            ];

            $user = User::find($fit->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
            $users->notify(new TestNotification($data));

            }
        }
      }
      if(count($rods) !=0){
        foreach ($rods as $rod) {
            $data = [
              'id' => $rod->id,
              'title' => 'ROAD-TAX EXPIRE Notification',
              'message' => $rod->vehicle->vch_no,
              'date' => $rod->valid_till
            ];

            $user = User::find($rod->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
            $users->notify(new TestNotification($data));

            }
        }
      }
      if(count($pers) !=0){
        foreach ($pers as $per) {
            $data = [
              'id' => $per->id,
              'title' => 'PERMIT EXPIRE Notification',
              'message' => $per->vehicle->vch_no,
              'date' => $per->valid_till
            ];

            $user = User::find($per->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
            $users->notify(new TestNotification($data));

            }
        }
      }

    }
    public function api_data(Request $request){
      // return $request->data['amount'];
      return $request->all();
      // return "hello";
    }

}
