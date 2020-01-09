<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TyreCompany;
use App\Models\TyreModel;
use App\Models\TyreMaterial;
use App\Models\TyreMaterialItemRequest;
use Session;
use Auth;

class MaterialRequestController extends Controller
{
    public function index()
    { 
        Session::forget('data');
        Session::forget('ids'); 
        
        $fleet_code = session('fleet_code');
        $lists    = TyreMaterial::where('fleet_code',$fleet_code)->get();
        return view('tyre.material_request.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        $fleet_code = session('fleet_code');
        $res1 =TyreMaterial::where('fleet_code',$fleet_code)->orderBy('id', 'DESC')->get();
        $res = count($res1);
        if($res == 0){
            $no = 1000001;
        }
        else{
            $no = $res1[0]->mtr_no+1;
        }

        $date =date("Y-m-d", time());
        $comp = TyreCompany::where('fleet_code',$fleet_code)->get();
        return view('tyre.material_request.create',compact('comp','no','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        return $request->all();
        $data1 = $request->validate(['mtr_no'=>'required','mtr_date'=>'required','prep_by'=>'required|string','total_qty'=>'nullable']);
        $data1['fleet_code'] = session('fleet_code');
        $data1['remarks']    = $request->remarks;
        $data1['created_by'] = Auth::user()->id;
        $last_id = TyreMaterial::create($data1)->id;

        $tyre_order_qty     = $request->tyre_order_qty;
        $tyre_condition  = $request->tyre_condition;
        $tyre_comp_name  = $request->tyre_comp_name;
        $tyre_type_name  = $request->tyre_type_name;
        $tyre_request  = $request->tyre_request;
        $tyre_remark  = $request->tyre_remark;
        $count = count($tyre_comp_name);
        $x = 0;
        $data = array();
        $info = '';
        while($x < $count) {
            $data['request_id']=  $last_id ;
            $data['tyre_comp_name']  = $tyre_comp_name[$x];
            $data['tyre_type_name']  = $tyre_type_name[$x];
            $data['tyre_condition']=  $tyre_condition[$x] ;
            $data['tyre_order_qty']  = $tyre_order_qty[$x];
            $data['tyre_request']  = $tyre_request[$x]; 
            $data['tyre_remark']   = $tyre_remark[$x];
            
           TyreMaterialItemRequest::create($data);
             $x++; 
            $info = 'done'; 
         }
         if(!empty($info)){
            Session::forget('data');
            Session::forget('ids'); 
         }
        return redirect('tyre_material_request');
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
        Session::forget('data');
        Session::forget('ids');

        $fleet_code = session('fleet_code');
        $comp = TyreCompany::where('fleet_code',$fleet_code)->get();
        $mtr  = TyreMaterial::where('fleet_code',$fleet_code)
                            ->where('id',$id)->first();
        $mtr_items  = TyreMaterialItemRequest::where('request_id',$id)->get();
        $data1 = array();
         foreach($mtr_items as $mtr_item){
            $com = TyreCompany::where('fleet_code',$fleet_code)->where('id',$mtr_item->tyre_comp_name)->first();
            $model = TyreModel::where('fleet_code',$fleet_code)->where('id',$mtr_item->tyre_type_name)->first();
            $data1['mtr_id'] = $id;
            $data1['comp_name'] = $com->comp_name;
            $data1['comp_id'] = $com->id;
            $data1['model_id'] = $model->id;
            $data1['condition_id'] = $mtr_item->tyre_condition;
            $data1['item_id'] = $mtr_item->id;
            $data1['order_qty'] = $mtr_item->tyre_order_qty;
            $data1['request_by'] = $mtr_item->tyre_request;
            $data1['tyre_remark'] = $mtr_item->tyre_remark;
            $data1['model_name'] = $model->model_name; 
            $data1['tyre_condition']    = $mtr_item->tyre_condition == 1 ? "NEW TYRE" : ($mtr_item->tyre_condition == 2 ? "OLD TYRE" : ($mtr_item->tyre_condition == 3 ? "REMOLDED TYRE" : ($mtr_item->tyre_condition == 4 ? "REJECTED TYRE" :"CUT REPAIRED TYRE")));            
            session()->push('ids',$model->id);
            session()->push('data.'.$model->id, $data1);
                    
         }
      return view('tyre.material_request.edit',compact('comp','mtr'));  
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
       // dd($request->all());
       $data1 = $request->validate([
        'mtr_no'=>'required',
        'mtr_date'=>'required',
        'prep_by'=>'required|string',
        'total_qty'=>'nullable'
    ]);
        $data1['remarks']    = $request->remarks;
        $last_id = TyreMaterial::find($id)->update($data1);

        $tyre_order_qty     = $request->tyre_order_qty;
        $tyre_condition  = $request->tyre_condition;
        $tyre_comp_name  = $request->tyre_comp_name;
        $tyre_type_name  = $request->tyre_type_name;
        $tyre_request  = $request->tyre_request;
        $tyre_remark  = $request->tyre_remark;
        $item_id  = $request->item_id;
        $count = count($tyre_comp_name);
        $x = 0;
        $data = array();
        $info = '';
        while($x < $count) {

            $data['request_id']=  $id ;
            $data['tyre_comp_name']  = $tyre_comp_name[$x];
            $data['tyre_type_name']  = $tyre_type_name[$x];
            $data['tyre_condition']=  $tyre_condition[$x] ;
            $data['tyre_order_qty']  = $tyre_order_qty[$x];
            $data['tyre_request']  = $tyre_request[$x]; 
            $data['tyre_remark']   = $tyre_remark[$x];
            $data['id']   = $item_id[$x];
         if($data['id'] == null) { 
            TyreMaterialItemRequest::create($data);
              
            }else{
            TyreMaterialItemRequest::where('id',$data['id'])->update($data);  
            }
            $x++; 
            $info = 'done';
         }
         return redirect('tyre_material_request');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        TyreMaterial::find($id)->delete();
        TyreMaterialItemRequest::where('request_id',$id)->delete();

        return redirect('tyre_material_request');

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
        $ids= $request->id;
        $fleet_code = session('fleet_code');
        $data1 = array();
        foreach ($ids as $id) {
            $data =TyreModel::where('fleet_code',$fleet_code)
                          ->where('id',$id)->with('company')->first();
            $data1['comp_name']     = $data->company->comp_name;
            $data1['comp_id']       = $data->company->id;
            $data1['model_name']    = $data->model_name;
            $data1['item_id']       = '';
            $data1['tyre_remark']   = '';
            $data1['order_qty']     = '';
            $data1['request_by']    = '';
            $data1['condition_id']  = '';             
            session()->push('ids',$data->id);
            session()->push('data.'.$data->id, $data1);
        }
        return view('tyre.material_request.material_request_item_table',compact('data'));            
     }
}
