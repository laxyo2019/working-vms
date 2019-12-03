<?php

namespace App\Imports;

use App\Models\InsuranceDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use Session;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Auth;

class InsuranceDetailsImport implements ToCollection,WithHeadingRow
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
                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no',$row['vehicle_number'])->first();
                //$pay_date   = $pay_date->format('Y-m-d');
                $valid_date   = !empty($row['insurancs_valid_from']) ?   Date::excelToDateTimeObject($row['insurancs_valid_from']) : null;
                $expire_date  = !empty($row['insurance_valid_till']) ? Date::excelToDateTimeObject($row['insurance_valid_till']) : null ;
                $valid_date   = $valid_date == null ? null : $valid_date->format('Y-m-d');
                $expire_date  = $expire_date == null ?  null : $expire_date->format('Y-m-d');
                if(!empty($vch_num)){
                    
                    InsuranceDetails::create([
                    'fleet_code'  => $row['fleet_code'],
                    'vch_id'      => $vch_num->id ,
                    //'agent_id'    => 1,
                    'ins_comp' => $row['insurance_company'],
                    'ins_type' => $row['insurance_type'],
                    'insured_name' => $row['insureds_name'],
                    'ins_policy_no' => $row['insurance_policy_number'],
                    'ins_total_amt'     => $row['insurance_total_amount'],
                    'ins_pre_policy_no'     => $row['insurance_prev_policy_no'],
                    'ncb_discount'     => $row['ncb_discount'],
                    'hypothecation_agreement'     => $row['hypothecation_agreement'],
                    'payment_mode'=> $row['insurance_payment_mode'],
                    //'pay_dt'      => $pay_date,
                    'pay_bank'    => $row['insurance_bank_name'],
                    'pay_branch'  => $row['insurance_branch_name'],
                    'valid_from'  => $valid_date,
                    'valid_till'  => $expire_date,
                    //'pay_no'      => $row['pay_number'],
                    'ins_comp'    => $row['insurance_company'],
                    'created_by'  => Auth::user()->id
                    ]);   
                }
            }
        }
         return $error;
    }
}
