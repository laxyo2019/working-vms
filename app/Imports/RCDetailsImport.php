<?php

namespace App\Imports;

use App\Models\RcDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Auth;;

class RCDetailsImport implements ToCollection,WithHeadingRow
{
     
    public function collection(Collection $rows)
    {   
        $error = array();
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            
            if(!empty($row['vehicle_number']))
            {   
                //$pay_date   = Date::excelToDateTimeObject($row['pay_date']);
                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();

                //$pay_date   = $pay_date->format('Y-m-d');
                    $valid_date   = !empty($row['rc_valid_from']) ?   Date::excelToDateTimeObject($row['rc_valid_from']) : null;
                    $expire_date  = !empty($row['rc_valid_till']) ? Date::excelToDateTimeObject($row['rc_valid_till']) : null ;
                    $valid_date   = $valid_date == null ? null : $valid_date->format('Y-m-d');
                    $expire_date  = $expire_date == null ?  null : $expire_date->format('Y-m-d');
                    $comp = PUCDetails::where('fleet_code',$fleet_code)->where('rc_no', $row['registration_card_no'])->first();
                if(empty($comp)){ 
                                  
                        RcDetails::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id ,
                        //'agent_id'    => 1,
                        'rc_no'  => $row['registration_card_no'],
                        'rc_amt' => $row['rc_amount'],
                        'payment_mode'=> $row['rc_payment_mode'],
                        //'pay_dt'      => $pay_date,
                        'pay_bank'    => $row['rc_bank_name'],
                        'pay_branch'  => $row['rc_branch_name'],
                        'valid_from'  => !empty($valid_date) ? $valid_date:null,
                        'valid_till'  => !empty($expire_date) ? $expire_date:null,
                        //'pay_no'      => $row['pay_number'],
                        'created_by'  => Auth::user()->id
                        ]); 
                }
            }
        }
         return $error;
    }
}
