<?php

namespace App\Imports;

use App\Models\FitnessDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Auth;

class FitnessDetailsImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {  
        // dd($rows);
        $error = array();
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            
            if(!empty($row['vehicle_number']))
            {   
                //$pay_date   = Date::excelToDateTimeObject($row['pay_date']);
                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();

                //$pay_date   = $pay_date->format('Y-m-d');
                    $valid_date   = !empty($row['fitness_valid_from']) ?   Date::excelToDateTimeObject($row['fitness_valid_from']) : null;
                    $expire_date  = !empty($row['fitness_valid_till']) ? Date::excelToDateTimeObject($row['fitness_valid_till']) : null ;
                    $valid_date   = $valid_date == null ? null : $valid_date->format('Y-m-d');
                    $expire_date  = $expire_date == null ?  null : $expire_date->format('Y-m-d');
                    $comp = FitnessDetails::where('fleet_code',$fleet_code)->where('fitness_no', $row['fitness_no'])->first();
                if(empty($comp)){     
                // dd($expire_date);               
                        FitnessDetails::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id ,
                        //'agent_id'    => 1,
                        'fitness_no'  => $row['fitness_no'],
                        'fitness_amt' => $row['fitness_amount'],
                        'payment_mode'=> $row['fitness_payment_mode'],
                        //'pay_dt'      => $pay_date,
                        'pay_bank'    => $row['fitness_bank_name'],
                        'pay_branch'  => $row['fitness_branch_name'],
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
