<?php
namespace App\Http\Controllers;

use App\Models\Finance\Vehicle_finance_ins;
use App\Models\Expenses\VehicleExpenses;
use App\Models\Finance\Vehicle_finance;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Tyre\TyreDetailsList;
use App\Models\Trip\Vehicle_Trip;
use App\Models\InsuranceDetails;
use App\Models\FitnessDetails;
use App\Models\RoadtaxDetails;
use App\Models\Tyre\TyreInfo;
use Illuminate\Http\Request;
use App\Models\StatePermit;
use App\Charts\PulseChart;
use App\Mail\SendMailable;
use App\Models\PUCDetails;
use App\Mail\UserRequest;
use App\Models\RcDetails;
use App\Models\Account;
use App\VehicleStatus;
use App\vehicle_master;
use App\GpsDailyData;
use App\FleetUser;
use Carbon\Carbon;
use App\SendCode;
use App\Product;
use App\Driver; 
use App\Fleet;
use App\User;
use Charts;
use Auth;
use DB;

class AccountUserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
      
        $owner = Auth::user()->id;
        $user = User::where('acc_type','=','C')->count();
        $u_fleet = User::where('id',$owner)->with('fleet_name.vehicles')->first();
        $d_Id =$this->get_owners_id();
        $i=0;

// Donut Chart Start
      $expenses   = VehicleExpenses::whereIn('created_by',$d_Id)->whereYear('date',date('Y'))->sum('amount');    

      $party_fleets   = Fleet::where('fleet_owner',$owner)->select('fleet_code')->get();
      $party_expenses = array();
      foreach ($party_fleets as $value) {
       
        $party_expenses[$value->fleet_code] = VehicleExpenses::where('fleet_code',$value->fleet_code)->whereYear('date',date('Y'))->sum('amount'); 
      };
      $chart2 =  Charts::create('donut', 'morris')
                            ->title('Expenses/Incomes :'." ".date('Y'))
                            ->labels(['Expences','Incomes'])
                            ->values([$expenses,450000])
                            ->elementLabel('Total Expenses And Incomes')
                            ->dimensions(1000,500)
                            ->colors(['#ff0000','#00ff00'])
                            ->responsive(true);
// Donut Chart End
      
// For Trip Chart
      $Trips   = Vehicle_Trip::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
       $chart1 = Charts::database($Trips,'bar', 'highcharts')
                ->title('Vehicle Trips')
                ->elementLabel('Total Trips')
                ->dimensions(1000,500)
                ->responsive(true)
                ->height(300)
                ->groupByMonth(date('Y'), true);

// End Chart
        if(!empty($d_Id)){
          $driver_count   = Driver::whereIn('created_by',$d_Id)->count();
          $trip_count     = Vehicle_Trip::whereIn('created_by',$d_Id)->orwhere( DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->count();
          $vehicleStatus  = VehicleStatus::whereIn('created_by',$d_Id)->with('vehicle')->get();
          $running_vch    = collect($vehicleStatus)->where('status','Running');
          $running        = count($running_vch);
          $standby_vch    = collect($vehicleStatus)->where('status','StandBy');
          $standby        = count($standby_vch);
          $repair_vch     = collect($vehicleStatus)->where('status','Repair/Maintenance');
          $repair         = count($repair_vch);
          $unloaded_vch   = collect($vehicleStatus)->where('status','ReadyForLoad');
          $unloaded       = count($unloaded_vch);
        }
        foreach($u_fleet->fleet_name as $fleet ){
            $i = $i + count($fleet->vehicles);
        }
        $fleet = Fleet::where('fleet_owner','=',$owner)->count();
        return view('account_user.dashboard',compact('user','fleet','i','driver_count','running','standby','repair','unloaded','running_vch','standby_vch','repair_vch','unloaded_vch','chart1','chart2','expenses','party_expenses')); 
    }
    public function account_user()
    {
        $user = get_fleet_users(Auth::user()->id)->get();
        return view('account_user.index',compact('user'));
    }

    public function create()
    {
        return view('account_user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'name'      => 'required',
                                   'email'     => 'required|email|unique:users,email',
                                   'mobile_no' => 'required|numeric'
                                 ]);
        $name1    = strtolower($request->name);
        $password = substr($name1,0,4).'1234';
        $data     = array(
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => Hash::make($password),
                    'mobile_no' => $request->mobile_no,
                    );
        $data['parent_id'] = Auth::user()->id;
        $data['acc_type']  = 'C';
        
        $last_id = User::insertGetId($data);
        $user    = User::find($last_id);
        $user->roles()->sync(3);

        $dta = array(
            'password'  => $password, 
            'email'     => $request->email,
            'mobile_no' => $request->mobile_no,
        );
        
        return $dta;
        
        //Mail::to($request->email)->send(new SendMailable($name));
        // dd($name);
        //return view('account_user.create',compact('name'));
    }
   
    public function show($id)
    { 
        $fleet = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('user_id',$id)->get();
        $user_id = $id; 
        $model_fleet = Fleet::where('fleet_owner',Auth::user()->id)->get();
       $user_fleet=FleetUser::where('user_id',$user_id)->get();
        $user_fleet_id = array();
        foreach ($user_fleet as $value) {
          $user_fleet_id[] = $value->fleet_id;
        }
       // dd($model_fleet);
        return view('account_user.show',compact('fleet','user_id','model_fleet','user_fleet_id'));
    }

    
    public function edit($id)
    {
        $data = User::find($id);
        return view('account_user.edit',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name' =>'required',
                                  ]);
        $data = User::find($id);
    
        $data['name'] = $request->name;
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
       $data->save();
        return redirect('account_users');
    }

    
    public function destroy($id)
    { 
        User::destroy($id);
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('account_users');
    }

    public function add_on_user(Request $request){
      $ids      = $request->id;
      $user_id  = $request->user_id;

      $data = array();
      foreach ($ids as $id) {
        $data = ['fleet_id'=>$id,'user_id'=>$user_id];
        DB::table('fleet_user')->insert($data);
      }
     $fleet = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('user_id',$user_id)->get();    
      return view('account_user.table_refresh',compact('fleet'));  
    }

    public function checkAccount(Request $request){
      $id = $request->id;
      $data = Account::where('acc_owner',$id)->get()->count();
      return $data;
    }

    public function AuthLogout(){
        Auth::logout();
    }

    public function verifiction(Request $request){
        dd("ram");
        $mobile_no = $request->mobile_no;

        $verify =SendCode::sendCode($mobile_no);
        return $verify;
    }

    public function get_chart(Request $request){
      $owner = Auth::user()->id;
        $user = User::where('acc_type','=','C')->count();
        $u_fleet = User::where('id',$owner)->with('fleet_name.vehicles')->first();
        $details_d = get_fleet_users($owner)->get();

        // For Chats Add
         if(!empty($request->product_year)){
          $products = Product::select(DB::raw("(SUM(prize)) as sum"),DB::raw("MONTHNAME(created_at) as monthname"))
                            ->whereYear('created_at',date($request->product_year))
                            ->groupBy('monthname')
                            ->orderBy('created_at', 'ASC')
                            ->get();
          $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
          
          $final_array = array();
          $product_months = array();
          foreach ($products as $value) {
            $product_months [] = $value->monthname;
            $final_array[] = $value->sum;
          }   
          $month_diff = array_diff($months,$product_months);
          $diff_product = array();
          foreach ($month_diff as $key => $value) {
              $diff_product[] = [
                'sum' => '0',
                'monthname' => $value,
              ] ; 
          } 
        if(empty($product_months)){
            $product_months = $months;
        }
    // return $product_months;
       $chart =  Charts::create('bar', 'highcharts')

                            ->title('PRODUCT')
                            ->elementLabel(date($request->product_year))
                            ->labels($product_months)

                            ->values($final_array)

                            ->dimensions(1000,500)

                            ->responsive(true);
      

         }else{
          $products = Product::select(DB::raw("(SUM(prize)) as sum"),DB::raw("MONTHNAME(created_at) as monthname"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('created_at', 'ASC')
                            ->get();
          $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
          
          $final_array = array();
          $product_months = array();
          foreach ($products as $value) {
            $product_months [] = $value->monthname;
            $final_array[] = $value->sum;
          }   
          $month_diff = array_diff($months,$product_months);
          $diff_product = array();
          foreach ($month_diff as $key => $value) {
              $diff_product[] = [
                'sum' => '0',
                'monthname' => $value,
              ] ; 
          } 
        if(empty($product_months)){
            $product_months = $months;
        }
    // return $product_months;
       $chart =  Charts::create('bar', 'highcharts')
                            ->title('PRODUCT')
                            ->elementLabel(date('Y'))
                            ->labels($product_months)
                            ->values($final_array)
                            ->dimensions(1000,500)
                            ->responsive(true);    
        }
        if(!empty($request->trip_year)){
        $Trips = Vehicle_Trip::where( DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date($request->trip_year))->get();
        $chart1 = Charts::database($Trips,'bar', 'highcharts')
                            ->title('Vehicle Trips')
                            ->elementLabel('Total Trips')
                            ->dimensions(1000,500)
                            ->responsive(true)
                            ->height(300)
                            ->groupByMonth(date($request->trip_year), true);
        }else{
        $Trips = Vehicle_Trip::where( DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart1 = Charts::database($Trips,'bar', 'highcharts')
                            ->title('Vehicle Trips')
                            ->elementLabel('Total Trips')
                            ->dimensions(1000,500)
                            ->responsive(true)
                            ->height(300)
                            ->groupByMonth(date('Y'), true);
        }
        
        // End Chart
        $no = count($details_d);
        $i =0;
        foreach($details_d as $data ){
        $d_Id[] = $data->id;
        }
        if(!empty($d_Id)){
          $driver_count = Driver::whereIn('created_by',$d_Id)->count();
          $vehicleStatus = VehicleStatus::whereIn('created_by',$d_Id)->with('vehicle')->get();

          $running_vch = collect($vehicleStatus)->where('status','Running');
          $running     = count($running_vch);
          $standby_vch = collect($vehicleStatus)->where('status','StandBy');
          $standby     = count($standby_vch);
          $repair_vch  = collect($vehicleStatus)->where('status','Repair/Maintenance');
          $repair      = count($repair_vch);
          $unloaded_vch= collect($vehicleStatus)->where('status','ReadyForLoad');
          $unloaded    = count($unloaded_vch);
        }
        // dd($running_vch);
        foreach($u_fleet->fleet_name as $fleet ){
            $i = $i + count($fleet->vehicles);
        }
        $fleet = Fleet::where('fleet_owner','=',$owner)->count();
        return view('account_user.dashboard',compact('user','fleet','i','driver_count','no','running','standby','repair','unloaded','running_vch','standby_vch','repair_vch','unloaded_vch','chart','chart1'));

    }
    public function account_puc_details(){
      $d_Id =$this->get_owners_id();
      $pucDetails = PUCDetails::whereIn('created_by',$d_Id)->with('owner')->get();
        $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
        return view('account_user.vehicle_doc.puc',compact('pucDetails','carbondate','curr'));
    }
    public function account_rc_details(){
       $d_Id =$this->get_owners_id();
       $rcDetails = RcDetails::whereIn('created_by',$d_Id)->with('owner')->get();
       $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
        return view('account_user.vehicle_doc.rc',compact('rcDetails','carbondate','curr'));
    }
    public function account_fitness_details(){
      $d_Id =$this->get_owners_id();
      $fitness = FitnessDetails::whereIn('created_by',$d_Id)->with('owner')->get();
      $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
        return view('account_user.vehicle_doc.fitness',compact('fitness','carbondate','curr'));
    }
    public function account_insurance_details(){
      $d_Id =$this->get_owners_id();
      $insurance = InsuranceDetails::whereIn('created_by',$d_Id)->with('owner')->get();
      $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
        return view('account_user.vehicle_doc.insurance',compact('insurance','carbondate','curr'));
    }
    public function account_permit_details(){
      $d_Id =$this->get_owners_id();
      $state = StatePermit::whereIn('created_by',$d_Id)->with('owner')->get();
      $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
        return view('account_user.vehicle_doc.permit',compact('state','carbondate','curr'));
    }
    public function account_roadtax_details(){
      $d_Id =$this->get_owners_id();
      $roadtax = RoadtaxDetails::whereIn('created_by',$d_Id)->with('owner')->get();
      $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
        return view('account_user.vehicle_doc.roadtax',compact('roadtax','carbondate','curr'));
    }
    public function account_finance_details(){
      $d_Id =$this->get_owners_id();
      $vehicles = Vehicle_finance::whereIn('created_by',$d_Id)->with('owner','vch_no')->get();
      $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d'); 
        return view('account_user.vehicle_doc.vehicle_finance',compact('vehicles','carbondate','curr'));
    }
    public function show_finance_Detailes($id){
      $data = Vehicle_finance_ins::where('request_id',$id)->with('vch')->orderBy('id')->get();
      $carbondate = Carbon::now()->addDays('15')->format('Y-m-d');
        $curr  = Carbon::now()->format('Y-m-d');
      $vch_no = $data[0]->vch->vch_no;
        return view('account_user.vehicle_doc.show_vehicle_finance_detailes',compact('data','vch_no','carbondate','curr'));
    }
    public function account_trip_details(){
      $d_Id =$this->get_owners_id();
      $data = Vehicle_Trip::whereIn('created_by',$d_Id)->with('owner','vehicle','from_city','to_city')->get();

        return view('account_user.vehicle_doc.vehicle_trip',compact('data'));
    }
    public function account_tyre_details(){
      $d_Id =$this->get_owners_id();

      $data     = vehicle_master::whereIn('created_by',$d_Id)->select('id','vch_imei')->get();
        $vch_id   = collect($data)->pluck('id');
        $vch_imei = collect($data)->pluck('vch_imei');
        $tyre_list       = TyreDetailsList::WhereIn('vch_no',$vch_id)->get();
        $gps_imei        = GpsDailyData::WhereIn('imei',$vch_imei)->select('duty_date','imei','reading')->with(['vehicle'=>function($query){ 
            $query->select('vch_imei','id','vch_no')->with('tyre')->get(); 
        }])->get();

        return view('account_user.vehicle_doc.vehicle_tyre',compact('gps_imei'));
    }
    public function get_owners_id(){
      $owner = Auth::user()->id;
      $details_d = get_fleet_users($owner)->get();
        $i =0;
        foreach($details_d as $data ){
        $d_Id[] = $data->id;
        } 
        return $d_Id;
    }
}

