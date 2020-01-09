<?php

namespace App\Imports;

use App\vch_comp;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\master_state;
use App\City;
use App\vch_model;
use Auth;

class VehicleModelImport implements ToCollection,WithHeadingRow
{
     public function collection(Collection $rows)
    {  
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
            $data = array();
            $status = TRUE;
            

            if($row['vehicle_company'] != '' && $row['vehicle_model'] != '') {
                $company = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['vehicle_company'])->first();
                if($status == TRUE){
                    if(!empty($company)){

                         $data['comp_id'] =  $company->id;
                         $status        = TRUE;                                       
                    }
                    else{
                        $status = FALSE;
                    }
                }
                if($status == TRUE){

                    $model = vch_model::where('fleet_code',$fleet_code)->where('model_name',$row['vehicle_model'])->first();
                   
                    if($model == null){

                    vch_model::create(['fleet_code'     => $fleet_code,
                                       'vcompany_code'  => $data['comp_id'],
                                       'model_name'     => $row['vehicle_model'],
                                       //'model_desc'     => $row['description'],
                                       'created_by'     => Auth::user()->id
                                     ]);  
                        }
                }
                
            }
        }
    }
}
