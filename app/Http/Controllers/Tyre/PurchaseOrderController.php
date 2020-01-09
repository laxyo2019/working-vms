<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TyreVendor;
use App\Models\TyreCompany;
use App\vehicle_master;
use App\Models\TyreModel;
use App\Models\TyreMaterial;
use App\Models\TyreOrderItem;
use App\Models\TyreMtr;
use App\Models\TyreMaterialItemRequest;
use App\Models\TyrePurchase;
use Session;
use Auth;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $fleet_code = session('fleet_code');
       $lists    = TyrePurchase::where('fleet_code',$fleet_code)->with('vendor')->get();
        return view('tyre.purchase.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session::forget('data');        
        Session::forget('ids');
        $fleet_code = session('fleet_code');
        $vendors =TyreVendor::where('fleet_code',$fleet_code)->get();
        $companys =TyreCompany::where('fleet_code',$fleet_code)->get();
        $res1 =TyrePurchase::where('fleet_code',$fleet_code)->orderBy('id', 'DESC')->get();

        $res = count($res1);
        if($res == 0){
            $no = 1000001;
        }
        else{
            $no = $res1[0]->po_number+1;
        }
        $date =date("Y-m-d", time());
        return view('tyre.purchase.create',compact('vendors','companys','no','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    { 
        
       $data           =  $request->validate([
            'qty.*'                 =>'required|string',
            'comp_id.*'             =>'required',
            'model_id.*'            =>'required',
            'tyre_condition_id.*'   =>'required',
            'rate.*'                =>'required|string',
            'disc_pct.*'            =>'required|string',
            'igst_pct.*'            =>'required|string',
            'cgst_pct.*'            =>'required|string',
            'sgst_pct.*'            =>'required|string',
            'amt.*'                 =>'nullable',
            'disc_amt.*'            =>'nullable',
            'igst_amt.*'            =>'nullable',
            'cgst_amt.*'            =>'nullable',
            'sgst_amt.*'            =>'nullable',
            'net_amt.*'             => 'nullable|numeric',
            'po_no'                 => 'required',
            'po_date'               => 'required|date',
            'vendor_code'           => 'nullable',
            'mtr_no'                => 'nullable|not_in:0',
            'total_qty'             => 'nullable|numeric',
            'grand_total'           => 'nullable|numeric',
            'totl_disc_amt'         => 'nullable|numeric',
            'totl_igst_amt'         => 'nullable|numeric',
            'totl_cgst_amt'         => 'nullable|numeric',
            'totl_sgst_amt'         => 'nullable|numeric',
            'totl_net_amt'          => 'nullable|numeric'
            ]);
      
       $po_data['fleet_code']  = session('fleet_code');
       $po_data['po_number']   = $data['po_no'];
       $po_data['po_date']     = $data['po_date'];
       $po_data['vendor_code'] = $data['vendor_code'];
       if($request->mtr_no !=0){
            $mtr_no1 = $request->mtr_no;
            $res     = TyreMtr::where('id',$mtr_no1)->first();
            $mtr_no  = $res->mtr_no;
            $po_data['mtr_no'] = $mtr_no;            
        }
       $po_data['total_qty']   = $data['total_qty'];
       $po_data['grand_total'] = $data['grand_total'];
       $po_data['disc_amt']    = $data['totl_disc_amt'];
       $po_data['igst_amt']    = $data['totl_igst_amt'];
       $po_data['cgst_amt']    = $data['totl_cgst_amt'];
       $po_data['sgst_amt']    = $data['totl_sgst_amt'];
       $po_data['net_amt']     = $data['totl_net_amt'];
       $po_data['created_by']  = Auth::user()->id;
       $po_id = TyrePurchase::create($po_data)->id;

        $count = 0;
        $status   = false;
        if(!empty($data['qty'])){
           $count = count($data['qty']);
     
           $x = 0;
           $id          = $request->id; 
           $qty         = $data['qty'];
           $comp        = $data['comp_id'];
           $model       = $data['model_id'];
           $condition   = $data['tyre_condition_id'];
           $rate        = $data['rate'];
           $disc_pct    = $data['disc_pct'];
           $igst_pct    = $data['igst_pct'];
           $cgst_pct    = $data['cgst_pct'];
           $sgst_pct    = $data['sgst_pct'];
           $amt         = $data['amt'];
           $disc_amt    = $data['disc_amt'];
           $igst_amt    = $data['igst_amt'];
           $cgst_amt    = $data['cgst_amt'];
           $sgst_amt    = $data['sgst_amt'];
           $net_amt     = $data['net_amt'];
           $status      = false;
           
           if($po_id){
                while($x < $count){
                    $itm_data['tyre_id']            = $id[$x];
                    $itm_data['po_id']              = $po_id;
                    $itm_data['qty']                = $qty[$x];
                    $itm_data['comp_id']            = $comp[$x];
                    $itm_data['type_id']            = $model[$x];
                    $itm_data['tyre_condition_id']  = $condition[$x];
                    $itm_data['rate']               = $rate[$x];
                    $itm_data['disc_pct']           = $disc_pct[$x];
                    $itm_data['igst_pct']           = $igst_pct[$x];
                    $itm_data['cgst_pct']           = $cgst_pct[$x];
                    $itm_data['sgst_pct']           = $sgst_pct[$x];
                    $itm_data['disc_amt']           = $disc_amt[$x];
                    $itm_data['igst_amt']           = $igst_amt[$x];
                    $itm_data['cgst_amt']           = $cgst_amt[$x];
                    $itm_data['sgst_amt']           = $sgst_amt[$x];
                    $itm_data['amt']                = $amt[$x];
                    $itm_data['net_amt']            = $net_amt[$x];
                    TyreOrderItem::create($itm_data);
                    $x++;
                    $status = true;
                }
              } 
        }
        if($status){
            session::forget('data');        
            Session::forget('ids');
        }
        return redirect('tyre_purchase');  
       
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
        session::forget('data');        
        Session::forget('ids');
        Session::forget('edit_id');
        $po_id = $id;
        $fleet_code = session('fleet_code');
        $vendors    = TyreVendor::where('fleet_code',$fleet_code)->get();
        $companys   = TyreCompany::where('fleet_code',$fleet_code)->get();
        $orders     = TyrePurchase::where('fleet_code',$fleet_code)->where('id',$id)->first();
        $orders_item = TyreOrderItem::where('po_id',$id)->get();
        foreach ($orders_item as $Data) {
            $comp_name     = TyreCompany::find($Data->comp_id);
            $model_name     = TyreModel::where('fleet_code',$fleet_code)->where('id',$Data->type_id)->first();
            Session::push('ids.'.$Data->id,$Data->id);
            Session::put('edit_id.'.$Data->id,$Data->id);
            $data1['item_id']  = $Data->id;
            $data1['id']       = $Data->id;
            $data1['po_id']    = $Data->po_id;
            $data1['tyre_id']  = $Data->tyre_id;
            $data1['comp_name']  = $comp_name->comp_name;
            $data1['comp_id']  = $Data->comp_id;
            $data1['model_name']  = $model_name->model_name;
            $data1['model_id']  = $Data->type_id;
            $data1['tyre_condition_id']  = $Data->tyre_condition_id;
            $data1['tyre_condition']  = $Data->tyre_condition == 1 ? "NEW TYRE" : ($Data->tyre_condition == 2 ? "OLD TYRE" : ($Data->tyre_condition == 3 ? "REMOLDED TYRE" : ($Data->tyre_condition == 4 ? "REJECTED TYRE" :"CUT REPAIRED TYRE")));
            $data1['qty']      = $Data->qty;
            $data1['rate']     = $Data->rate;
            $data1['amt']      = $Data->amt;
            $data1['disc_pct'] = $Data->disc_pct;
            $data1['disc_amt'] = $Data->disc_amt;
            $data1['igst_pct'] = $Data->igst_pct;
            $data1['igst_amt'] = $Data->igst_amt;
            $data1['cgst_pct'] = $Data->cgst_pct;
            $data1['cgst_amt'] = $Data->cgst_amt;
            $data1['sgst_pct'] = $Data->sgst_pct;
            $data1['sgst_amt'] = $Data->sgst_amt;
            $data1['net_amt']  = $Data->net_amt;
            $data1['remark']  = $Data->remarks;
            session()->push('data.'.$Data->id, $data1);  
        }
        return view('tyre.purchase.edit',compact('vendors','companys','orders','po_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_purchase_save(Request $request)
    {
        $po_id = $request->po_id;
        $data1 = $request->validate([
            'po_number'=>'nullable',
            'po_date'=>'required',
            'mtr_no'=>'nullable',
            'vendor_code'=>'required',
            'total_qty'=>'nullable'
        ]);
        
        $data1['remarks']          = $request->remarks;
        $data1['grand_total']      = $request->grand_total;
        $data1['disc_amt']         = $request->totl_disc_amt;
        $data1['igst_amt']    = $request->totl_igst_amt;
        $data1['cgst_amt']    = $request->totl_cgst_amt;
        $data1['sgst_amt']    = $request->totl_sgst_amt;
        $data1['net_amt']     = $request->totl_net_amt;
        
        $last_id = TyrePurchase::where('id',$po_id)->update($data1);
        $remarks              = $request->remark;
        $item_id              = $request->item_id;
        $comp_id              = $request->comp_id;
        $model_id             = $request->model_id;
        $tyre_condition_id    = $request->tyre_condition_id;
        $qty                  = $request->qty;
        $rate                 = $request->rate;
        $amt                  = $request->amt;
        $disc_pct             = $request->disc_pct;
        $disc_amt             = $request->disc_amt;
        $igst_pct             = $request->igst_pct;
        $igst_amt             = $request->igst_amt;
        $cgst_pct             = $request->cgst_pct;
        $cgst_amt             = $request->cgst_amt;
        $sgst_pct             = $request->sgst_pct;
        $sgst_amt             = $request->sgst_amt;
        $net_amt              = $request->net_amt;
        $count = count($comp_id);
        $x = 0;
        $data = array();
        $info = '';
            while($x < $count) {

            $data['po_id']                = $po_id;
            $data['remarks']              = $remarks[$x] ? $remarks[$x] : '';
            $value                        = $item_id[$x];
            $data['comp_id']              = $comp_id[$x] ;
            $data['type_id']              = $model_id[$x];
            $data['tyre_condition_id']    = $tyre_condition_id[$x]; 
            $data['qty']                  = $qty[$x];
            $data['rate']                 = $rate[$x];
            $data['amt']                  = $amt[$x];
            $data['disc_pct']             = $disc_pct[$x];
            $data['disc_amt']             = $disc_amt[$x];
            $data['igst_pct']             = $igst_pct[$x];
            $data['igst_amt']             = $igst_amt[$x];
            $data['cgst_pct']             = $cgst_pct[$x];
            $data['cgst_amt']             = $cgst_amt[$x];
            $data['sgst_pct']             = $sgst_pct[$x];
            $data['sgst_amt']             = $sgst_amt[$x];
            $data['net_amt']              = $net_amt[$x];

        
         if($value == null) { 
            TyreOrderItem::create($data);
              
            }else{

            TyreOrderItem::where('id',$value)->update($data);  
            }
          $x++; 
            $info = 'done';
         }
         
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

    public function get_type(Request $request)
    { 
        $id = $request->id;
        $fleet_code = session('fleet_code');
        $data =TyreCompany::where('fleet_code',$fleet_code)
                              ->where('id',$id)->with('detail')->get();
           return response()->json($data);                  
    }
    public function get_mtr_no(){

        $fleet_code = session('fleet_code');
        $data       = TyreMaterial::where('fleet_code',$fleet_code)->get(); ?>
        <option>Select..</option>
    <?php   foreach ($data as $Data) { ?>
                <option value="<?php echo $Data->id ; ?>" ><?php echo $Data->mtr_no; ?></option>
    <?php   } 
    }

    public function get_mtr_list(Request $request)
    {
        session::forget('data');        
        Session::forget('ids');
        
        $id = $request->id;
        $data =TyreMaterialItemRequest::where('request_id',$id)->get();
        
        foreach ($data as $Data){
                    $comp_name = TyreCompany::find($Data->tyre_comp_name);
                    $model_name = TyreModel::find($Data->tyre_type_name);
                    Session::push('ids.'.$Data->id,$Data->id);
                    $data1['id']                = $Data->id;
                    $data1['item_id']                = '';
                    $data1['comp_name']         = $comp_name->comp_name;
                    $data1['comp_id']           = $comp_name->id;
                    $data1['model_id']          = $model_name->id;
                    $data1['tyre_condition_id'] = $Data->tyre_condition;
                    $data1['model_name']        = $model_name->model_name;
                    $data1['tyre_condition']    = $Data->tyre_condition == 1 ? "NEW TYRE" : ($Data->tyre_condition == 2 ? "OLD TYRE" : ($Data->tyre_condition == 3 ? "REMOLDED TYRE" : ($Data->tyre_condition == 4 ? "REJECTED TYRE" :"CUT REPAIRED TYRE")));
                    $data1['qty']      = '' ;
                    $data1['rate']     = '';
                    $data1['amt']      = '';
                    $data1['disc_pct'] = '';
                    $data1['disc_amt'] = '';
                    $data1['igst_pct'] = '';
                    $data1['igst_amt'] = '';
                    $data1['cgst_pct'] = '';
                    $data1['cgst_amt'] = '';
                    $data1['sgst_pct'] = '';
                    $data1['sgst_amt'] = '';
                    $data1['net_amt']  = '';
                    $data1['remark']   = '';
                    $data1['mtr_data'] = 'yes';
                   
                    session()->put('mtr_data','yes');
                    session()->push('data.'.$Data->id, $data1);
        }
        return view('tyre.purchase.po_item_table',compact('data')); 
    }

    public function remove_session(Request $request){
 
        $id   = $request->id;
       // $page = $request->page;
        session::forget('data.'.$id);        
        Session::forget('ids.'.$id);
        $data = session('data');
        return view('tyre.purchase.po_item_table',compact('data'));
        // dd(session('ids'));
        // if($page == 'edit'){                 
        //      return view('spare.inventory.purchase_order.po_item_table',compact('data'));
        //  }            
    }

    public function save_session(Request $request)
    { 
        $comp_name = $request->tyre_comp_name;
        $tyre_type =$request->tyre_type_name;
        $tyre_condition = $request->tyre_condition;
        $comp_name = TyreCompany::where('id',$comp_name)->first();
        $model_name = TyreModel::where('id',$tyre_type)->first();
        Session::push('ids.'.$model_name->id,$comp_name->id);
            $data1['id']                = $comp_name->id;
            $data1['item_id']           = '';
            $data1['comp_name']         = $comp_name->comp_name;
            $data1['comp_id']           = $comp_name->id;
            $data1['model_id']          = $model_name->id;
            $data1['tyre_condition_id'] = $tyre_condition;
            $data1['model_name']        = $model_name->model_name;
            $data1['tyre_id']           = $tyre_type;
            $data1['tyre_condition']    = $tyre_condition == 1 ? "NEW TYRE" : ($tyre_condition == 2 ? "OLD TYRE" : ($tyre_condition == 3 ? "REMOLDED TYRE" : ($tyre_condition == 4 ? "REJECTED TYRE" :"CUT REPAIRED TYRE")));
            $data1['qty']      = '' ;
            $data1['rate']     = '';
            $data1['amt']      = '';
            $data1['disc_pct'] = '';
            $data1['disc_amt'] = '';
            $data1['igst_pct'] = '';
            $data1['igst_amt'] = '';
            $data1['cgst_pct'] = '';
            $data1['cgst_amt'] = '';
            $data1['sgst_pct'] = '';
            $data1['sgst_amt'] = '';
            $data1['net_amt']  = '';
            $data1['remark']   = '';
            $data1['mtr_data'] = 'yes';
           
            session()->put('mtr_data','yes');
            session()->push('data.'.$comp_name->id, $data1);

            return view('tyre.purchase.po_item_table',compact('data')); 


    }
}
