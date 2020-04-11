<?php

namespace App\Imports;

use App\Models\RoadtaxDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Auth;

class RoadtaxDetailsImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {   
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
        // dd($row); 
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']))
            {
                //$pay_date   = Date::excelToDateTimeObject($row['pay_date']);

                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();

                //$pay_date   = $pay_date->format('Y-m-d');
                $valid_date   = !empty($row['road_tax_valid_from']) ?   Date::excelToDateTimeObject($row['road_tax_valid_from']) : null;
                $expire_date  = !empty($row['road_tax_valid_till']) ? Date::excelToDateTimeObject($row['road_tax_valid_till']) : null ;
                $receipt_date  = !empty($row['road_tax_receipt_date']) ? Date::excelToDateTimeObject($row['road_tax_receipt_date']) : null ;
                $valid_date   = $valid_date == null ? null : $valid_date->format('Y-m-d');
                $expire_date  = $expire_date == null ?  null : $expire_date->format('Y-m-d');
                $receipt_date = $receipt_date == null ?  null : $receipt_date->format('Y-m-d');
                $comp = RoadtaxDetails::where('fleet_code',$fleet_code)->where('roadtax_no', $row['goods_service_tax_no'])->first();
           
                if(empty($comp)){
                    
                        RoadtaxDetails::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id ,
                        //'agent_id'    => 1,
                        'tax_type'    => $row['tax_type'] == 'QUARTERLY ROAD TEX' ? 1 : ($row['tax_type'] == 'HALF  YEARLY TAX' ? 2 : 3),
                        'roadtax_no'  => $row['goods_service_tax_no'],
                        'roadtax_amt' => $row['road_tax_amount'],
                        'payment_mode'=> $row['road_tax_payment_mode'],
                        //'pay_dt'      => $pay_date,
                        'receipt_id'  => $row['road_tax_receipt_id'],
                        'receipt_date'=> !empty($receipt_date) ? $receipt_date:null,
                        'pay_bank'    => $row['road_tax_bank_name'],
                        'pay_branch'  => $row['road_tax_branch_name'],
                        'valid_from'  => !empty($valid_date) ? $valid_date:null,
                        'valid_till'  => !empty($expire_date) ? $expire_date:null,
                        'expire_time' => $expire_date == 'LIFETIME' ? 3 : null,
                        //'pay_no'      => $row['pay_number'],
                        'created_by'  => Auth::user()->id
                        ]); 
                  

                }
            }
        }
         return $error;
    }
}
