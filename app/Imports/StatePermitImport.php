<?php

namespace App\Imports;

use App\Models\StatePermit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\vehicle_master;
use Session;
use App\State;
use Auth;

class StatePermitImport implements ToCollection,WithHeadingRow
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
                $state = State::where('state_name',$row['state'])->first();

                //$pay_date   = $pay_date->format('Y-m-d');$valid_date   = !empty($row['fitness_valid_from']) ?   
                $valid_date   = !empty($row['permit_valid_from']) ?   Date::excelToDateTimeObject($row['permit_valid_from']) : null;
                $expire_date  = !empty($row['permit_valid_till']) ? Date::excelToDateTimeObject($row['permit_valid_till']) : null ;
                $valid_date   = $valid_date == null ? null : $valid_date->format('Y-m-d');
                $expire_date  = $expire_date == null ?  null : $expire_date->format('Y-m-d');
                $comp = StatePermit::where('fleet_code',$fleet_code)->where('permit_no', $row['permit_no'])->first();
                if(empty($comp)){
            
                        StatePermit::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id ,
                        //'agent_id'    => 1,
                        'permit_no'   => $row['permit_no'],
                        'permit_amt'  => $row['permit_amount'],
                        'payment_mode'=> $row['permit_payment_mode'],
                        //'pay_dt'      => $pay_date,
                        'pay_bank'    => $row['permit_bank_name'],
                        'pay_branch'  => $row['permit_branch_name'],
                        'valid_from'  => $valid_date,
                        'valid_till'  => $expire_date,
                        //'pay_no'      => $row['pay_number'],
                        'state_id'    => !empty($state->id) ? $state->id : null,
                        'created_by'  => Auth::user()->id
                        ]); 
                    //}

                }
            }
        }
         return $error;
    }
}
