<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\VehicleType;
use App\vehicle_master;
use PhpOffice\PhpSpreadsheet\Shared\Date; 
use App\vch_comp;
use App\vch_model;

class UpdateVehicleDetailsImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
        	$data = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['vehicle_company'])->first();

            $vch_type = VehicleType::where('fleet_code',$fleet_code)->where('vch_type',$row['vehicle_type'])->first();

           
        	$model = vch_model::where('fleet_code',$fleet_code)->where('model_name',$row['vehicle_model'])->first();
            //for serial no(randdom no)
            $length = 12;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
    if($fleet_code == $row['fleet_code']){
       
       
            if(!empty($row['vehicle_number']))                
            {   
                
                    $comp = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', $row['vehicle_number'])->first();

                    // dd($row['registration_date']);
                    $invoice_date   = !empty($row['invoice_date']) ?   Date::excelToDateTimeObject($row['invoice_date']) : null;
                    $registration_date = !empty($row['registration_date']) ? Date::excelToDateTimeObject($row['registration_date']) : null ;
                    $invoice_date   = $invoice_date == null ? null : $invoice_date->format('Y-m-d');
                    $registration_date   = $registration_date == null ?  null : $registration_date->format('Y-m-d') ;

                if(!empty($comp)){
                  
                        vehicle_master::where('fleet_code',$fleet_code)
                        				->where('id', $comp->id)
                        				->update([

                                                    'fleet_code'           =>$fleet_code,
                                                    'vch_no'               =>$row['vehicle_number'],
                                                    'vch_type'             => $vch_type ? $vch_type->id : 'NO RECORD',

                                                    'vch_class'            =>$row['vehicle_class'],
                                                    'vch_km_reading'       =>$row['km_reading'],
                                                    'vch_comp'             =>!empty($data->id) ? $data->id :0,
                                                    'vch_model'            =>!empty($model->id)? $model->id:0,
                                                    'vch_serial_no'        =>$randomString,
                                                    'owner_name'           =>$row['vehicle_owner_name'],
                                                    'owner_addr'           =>$row['owner_address'],
                                                    'owner_pan'            =>$row['owner_pan_card_no'],
                                                    'reg_make'             =>$row['maker'],
                                                    'reg_mileage'          =>$row['avg_milage'],
                                                    'reg_seating_capacity' =>$row['seating_capacity'],
                                                    'reg_unladen_weight'   =>$row['unladen_weight'],
                                                    'reg_type_of_body'     =>$row['type_of_body'],
                                                    'reg_no_tyres'         =>$row['no_of_tyers'],
                                                    'reg_chassis_no'       =>$row['chassis_no'],
                                                    'reg_engine_no'        =>$row['engine_no'],
                                                    'reg_manuf_year'       =>$row['manufacture_year'],
                                                    'reg_date'             =>!empty($registration_date) ? $registration_date:null,
                                                    'reg_tank_cap'         =>$row['fuel_tank_capacity'],
                                                    'chassis_color'        =>$row['chassis_color'],
                                                    'body_color'           =>$row['body_color'],
                                                    'eng_power'            =>$row['horse_power'],
                                                    'reg_invoice_no'       =>$row['invoice_no'],
                                                    'reg_invoice_date'     =>!empty($invoice_date) ? $invoice_date:null,
                                                    'eng_fuel_type'        =>$row['type_of_fuel'],
                                                    'cubic_capacity'       =>$row['cubic_capacity']
                                                             ]);

                	  
                }else{
                	vehicle_master::create([
                                                    'fleet_code'           =>$fleet_code,
                                                    'vch_no'               =>$row['vehicle_number'],
                                                    'vch_class'            =>$row['vehicle_class'],
                                                    'vch_km_reading'       =>$row['km_reading'],
                                                    'vch_comp'             =>!empty($data->id) ? $data->id :0,
                                                    'vch_model'            =>!empty($model->id)? $model->id:0,
                                                    'vch_serial_no'        =>$randomString,
                                                    'owner_name'           =>$row['vehicle_owner_name'],
                                                    'owner_addr'           =>$row['owner_address'],
                                                    'owner_pan'            =>$row['owner_pan_card_no'],
                                                    'reg_make'             =>$row['maker'],
                                                    'reg_mileage'          =>$row['avg_milage'],
                                                    'reg_seating_capacity' =>$row['seating_capacity'],
                                                    'reg_unladen_weight'   =>$row['unladen_weight'],
                                                    'reg_type_of_body'     =>$row['type_of_body'],
                                                    'reg_no_tyres'         =>$row['no_of_tyers'],
                                                    'reg_chassis_no'       =>$row['chassis_no'],
                                                    'reg_engine_no'        =>$row['engine_no'],
                                                    'reg_manuf_year'       =>$row['manufacture_year'],
                                                    'reg_date'             =>!empty($registration_date) ? $registration_date:null,
                                                    'reg_tank_cap'         =>$row['fuel_tank_capacity'],
                                                    'chassis_color'        =>$row['chassis_color'],
                                                    'body_color'           =>$row['body_color'],
                                                    'eng_power'            =>$row['horse_power'],
                                                    'reg_invoice_no'       =>$row['invoice_no'],
                                                    'reg_invoice_date'     =>!empty($invoice_date) ? $invoice_date:null,
                                                    'eng_fuel_type'        =>$row['type_of_fuel'],
                                                    'cubic_capacity'       =>$row['cubic_capacity']
                                                             ]); 
                }                

            }
        }
        }
        
         return $error;
    }
}
