<?php

namespace App\Imports;

use App\Models\PUCDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\vehicle_master;
use DB;
use DateTime;
use Auth;

class PUCDetailsImport implements ToCollection,WithHeadingRow
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

                $valid_date   = !empty($row['puc_valid_from']) ?   Date::excelToDateTimeObject($row['puc_valid_from']) : null;
                $expire_date  = !empty($row['puc_valid_till']) ? Date::excelToDateTimeObject($row['puc_valid_till']) : null ;
                $valid_date   = $valid_date == null ? null : $valid_date->format('Y-m-d');
                $expire_date  = $expire_date == null ?  null : $expire_date->format('Y-m-d') ;

                //$pay_date   = $pay_date->format('Y-m-d');
                $comp = PUCDetails::where('fleet_code',$fleet_code)->where('puc_no', $row['puc_no'])->first();
                if(empty($comp)){
                    PUCDetails::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id,
                        'puc_no'      => $row['puc_no'],
                        'puc_amt'     => $row['puc_amount'],
                        'payment_mode'=> $row['puc_payment_mode'],
                        //'pay_no'      => $row['pay_number'],
                        //'pay_dt'      => $pay_date,
                        'pay_bank'    => $row['puc_bank_name'],
                        'pay_branch'  => $row['puc_branch_name'],
                        'valid_from'  => !empty($valid_date) ? $valid_date:null,
                        'valid_till'  => !empty($expire_date) ? $expire_date:null,
                        //'valid_till'  =>$valid_till,
                        'created_by'  => Auth::user()->id
                        ]); 
                    //}

                }
            }
        }
         return $error;
    }
}
