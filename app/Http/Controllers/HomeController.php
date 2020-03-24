<?php

namespace App\Http\Controllers;

use App\Notifications\TestNotification;
use App\Models\InsuranceDetails;
use App\Models\FitnessDetails;
use App\Models\RoadtaxDetails;
use Illuminate\Http\Request;
use App\Models\StatePermit;
use App\GSDailyMoveBackup;
use App\Models\PUCDetails;
use App\Models\RcDetails;
use App\GSDailyMove;
use Carbon\Carbon;
use App\User;
use Session;
use Auth;
use DB;

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
              'date' => $puc->valid_till,
              'url' => 'pucdetails'
            ];

            $user = User::find($puc->created_by);
          $user->notify(new TestNotification($data));

            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
              $data['url'] = 'account_puc_details';
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
              'date' => $rc->valid_till,
              'url' => 'rcdetails'
            ];

            $user = User::find($rc->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
              $data['url'] = 'account_rc_details';
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
              'date' => $ins->valid_till,
              'url' => 'insurance'
            ];

            $user = User::find($ins->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
              $data['url'] = 'account_insurance_details';
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
              'date' => $fit->valid_till,
              'url' => 'fitness'
            ];

            $user = User::find($fit->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
              $data['url'] = 'account_fitness_details';
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
              'date' => $rod->valid_till,
              'url' => 'roadtax'
            ];

            $user = User::find($rod->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
              $data['url'] = 'account_roadtax_details';
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
              'date' => $per->valid_till,
              'url' => 'statepermit'
            ];

            $user = User::find($per->created_by);
          $user->notify(new TestNotification($data));
            if($user->parent_id !=null){
              $users = User::find($user->parent_id);
              $data['url'] = 'account_permit_details';
            $users->notify(new TestNotification($data));

            }
        }
      }

    }
    public function api_data(Request $request){

      $datas =  json_decode(file_get_contents('http://s0.apnagps.com/track/vms/api/Active'), true);

      foreach ($datas as $value ) {
         $data = [
          'id'        => $value['id'],
          'duty_date' => $value['duty_date'],
          'user_id'   => $value['user_id'],
          'imei'      => $value['imei'],
          'device_name' => $value['device_name'],
          'reading'   => $value['reading'],
          'username'  => $value['username'],
          'status'    => $value['status'],
        ];
        $imei = GSDailyMove::where('imei',$value['imei'])->count();
        if($imei){
          GSDailyMove::where('imei',$value['imei'])->update([
                                                            'duty_date' => $value['duty_date'],
                                                            'reading'   => $value['reading']
                                                            ]);
        }else{
        GSDailyMove::insert($data); 
        }
        // GSDailyMove::insert($data);
      }
    
    }
    public function api_data_delete(){
        GSDailyMove::truncate();

      }
    public function api_data_backup(){
        $datas =  GSDailyMove::all();

      foreach ($datas as $value ) {
         $data = [
          'id'        => $value['id'],
          'duty_date' => $value['duty_date'],
          'user_id'   => $value['user_id'],
          'imei'      => $value['imei'],
          'device_name' => $value['device_name'],
          'reading'   => $value['reading'],
          'username'  => $value['username'],
          'status'    => $value['status'],
        ];
        $imei = GSDailyMoveBackup::where('imei',$value['imei'])->count();
        if($imei){
          GSDailyMoveBackup::where('imei',$value['imei'])->update([
                                                            'duty_date' => $value['duty_date'],
                                                            'reading'   => $value['reading']
                                                            ]);
        }else{
        GSDailyMoveBackup::insert($data); 
        }
        // GSDailyMove::insert($data);
      }
    }

    public function notification_read($id){
      $notification = auth()->user()->unreadNotifications->where('id',$id)->first();
       $notification->markAsRead();
       // return "asdasd";
       return redirect($notification->data['url']);
    }
}
