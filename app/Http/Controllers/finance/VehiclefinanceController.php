<?php

namespace App\Http\Controllers\finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_master;
use App\Models\Finance\Vehicle_finance;
use App\Models\Finance\Vehicle_finance_ins;
use App\master_state;
use Auth;
use DB;

class VehiclefinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleet_code = session('fleet_code');
        $vehicles   = Vehicle_finance::where('fleet_code',$fleet_code)->with('vch_no')->get();
       return view('finance.vehicle_finance.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $state = master_state::where('fleet_code',$fleet_code)->get();
        return view('finance.vehicle_finance.create',compact('vehicle','state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                                    'vch_id'                    => 'required',
                                    'customer_name'             => 'required',
                                    'guranter_name'             => 'required',
                                    'customer_address'          => 'required',
                                    'guranter_address'          => 'required',
                                    'customer_state_id'         => 'required|not_in:0',
                                    'guranter_state_id'         => 'required|not_in:0',
                                    'customer_city_id'          => 'required|not_in:0',
                                    'guranter_city_id'          => 'required|not_in:0',
                                    'contract_no'               => 'required',
                                    'contract_date'             => 'required',
                                    'contract_period'           => 'required',
                                    'expair_date'               => 'required',
                                    'finance_rate'              => 'nullable',
                                    'moratorium'                => 'nullable',
                                    'product_model'             => 'nullable',
                                    'engine_no'                 => 'nullable',
                                    'chassis_no'                => 'nullable',
                                    'reg_no'                    => 'nullable',
                                    'finance_com_name'          => 'nullable',
                                    'finance_amount'            => 'required',
                                    'total_amount'              => 'nullable',
                                    'interest_charges'          => 'nullable',
                                    'paid'                      => 'nullable',
                                    'documentation_charge'      => 'nullable',
                                    'balance'                   => 'nullable',
                                    'first_year_insurance'      => 'nullable',
                                    'expanse1'                  => 'nullable',
                                    'remark1'                   => 'nullable',
                                    'expanse2'                  => 'nullable',
                                    'remark2'                   => 'nullable',
                                    'expanse3'                  => 'nullable',
                                    'remark3'                   => 'nullable',
                                    'agreement_value'           => 'nullable',
                                    'installment_no'            => 'nullable',
                                    'per_installment_amount'    => 'nullable',
                                    'first_installment_date'    => 'nullable',
                                    
        ]);

        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        $last_id = Vehicle_finance::create($data)->id;


        $fist_ins_date_lst          = $request->fist_ins_date_lst;
        $per_ins_amt_lst            = $request->per_ins_amt_lst;
        $agreement_value_lst        = $request->agreement_value_lst;
        $vch_id                     = $request->vch_id;
        $count = count($per_ins_amt_lst);
        $x = 0;
        $data = array();
        while($x < $count) {
            $data['fleet_code']             = session('fleet_code');
            $data['created_by']             = Auth::user()->id;
            $data['request_id']             = $last_id ;
            $data['vch_id']                 = $vch_id ;
            $data['fist_ins_date_lst']      = $fist_ins_date_lst[$x];
            $data['per_ins_amt_lst']        = $per_ins_amt_lst[$x];
            $data['agreement_value_lst']    = $agreement_value_lst[$x] ;
           Vehicle_finance_ins::create($data);
             $x++;  
         }
         return redirect('vehiclefinance'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("this is show controller");
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
        $finances       = Vehicle_finance::where('fleet_code',$fleet_code)->where('id',$id)->with('vch_no')->first();
        $finances_ins   = Vehicle_finance_ins::where('fleet_code',$fleet_code)->where('request_id',$id)->get();
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $state = master_state::where('fleet_code',$fleet_code)->get();
        return view('finance.vehicle_finance.edit',compact('finances','finances_ins','vehicle','state'));
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
       $data = $request->validate([
                                    'vch_id'                    => 'required',
                                    'customer_name'             => 'required',
                                    'guranter_name'             => 'required',
                                    'customer_address'          => 'required',
                                    'guranter_address'          => 'required',
                                    'customer_state_id'         => 'required|not_in:0',
                                    'guranter_state_id'         => 'required|not_in:0',
                                    'customer_city_id'          => 'required|not_in:0',
                                    'guranter_city_id'          => 'required|not_in:0',
                                    'contract_no'               => 'required',
                                    'contract_date'             => 'required',
                                    'contract_period'           => 'required',
                                    'expair_date'               => 'required',
                                    'finance_rate'              => 'nullable',
                                    'moratorium'                => 'nullable',
                                    'product_model'             => 'nullable',
                                    'engine_no'                 => 'nullable',
                                    'chassis_no'                => 'nullable',
                                    'reg_no'                    => 'nullable',
                                    'finance_com_name'          => 'nullable',
                                    'finance_amount'            => 'required',
                                    'total_amount'              => 'nullable',
                                    'interest_charges'          => 'nullable',
                                    'paid'                      => 'nullable',
                                    'documentation_charge'      => 'nullable',
                                    'balance'                   => 'nullable',
                                    'first_year_insurance'      => 'nullable',
                                    'expanse1'                  => 'nullable',
                                    'remark1'                   => 'nullable',
                                    'expanse2'                  => 'nullable',
                                    'remark2'                   => 'nullable',
                                    'expanse3'                  => 'nullable',
                                    'remark3'                   => 'nullable',
                                    'agreement_value'           => 'nullable',
                                    'installment_no'            => 'nullable',
                                    'per_installment_amount'    => 'nullable',
                                    'first_installment_date'    => 'nullable',
                                    
        ]);

        $data['fleet_code'] = session('fleet_code');
        Vehicle_finance::where('id',$id)->update($data);
       

        $fist_ins_date_lst          = $request->fist_ins_date_lst;
        $per_ins_amt_lst            = $request->per_ins_amt_lst;
        $agreement_value_lst        = $request->agreement_value_lst;
        $vch_id                     = $request->vch_id;
        $count = count($per_ins_amt_lst);
        $x = 0;
         Vehicle_finance_ins::where('request_id',$id)->delete();
        $data1 = array();
        while($x < $count) {
            
            $data1['fleet_code']             = session('fleet_code');
            $data1['created_by']             = Auth::user()->id;
            $data1['request_id']             = $id ;
            $data1['vch_id']                 = $vch_id ;
            $data1['fist_ins_date_lst']      = $fist_ins_date_lst[$x];
            $data1['per_ins_amt_lst']        = $per_ins_amt_lst[$x];
            $data1['agreement_value_lst']    = $agreement_value_lst[$x] ;
           
           Vehicle_finance_ins::create($data1);
             $x++;  
         }
         
         return redirect('vehiclefinance'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle_finance::find($id)->delete();
        Vehicle_finance_ins::where('request_id',$id)->delete();
        return redirect('vehiclefinance');
    }
    public function city(Request $request){
        $id   = $request->id;
        $city = DB::table('master_cities')->where('state_id',$id)->get();
        ?>
        <option value="0">Select..</option>
    <?php    foreach ($city as $cities) { ?>
            <option value='<?php echo $cities->id ;?>' <?php if($cities->id == $request->city_id){ echo "selected"; } ?> ><?php echo $cities->city_name ;?>
        </option>
    <?php  } 
    }
}
