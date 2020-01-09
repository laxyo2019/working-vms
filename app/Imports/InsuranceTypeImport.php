<?php

namespace App\Imports;

use App\Models\InsuranceCompany;
use App\Models\InsuranceType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use Auth; 


class InsuranceTypeImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {  
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['insurance_type']))              
            {  

                $insurance_company = InsuranceCompany::where('fleet_code',$fleet_code)->where('comp_name','like',$row['insurance_company'])->first();
                $type = InsuranceType::where('fleet_code',$fleet_code)->where('type_name',$row['insurance_type'])->get();
                $count=count($type);
                if($count == 0){
                    InsuranceType::create(['fleet_code'  => $row['fleet_code'],
                                    'type_name' => ucfirst($row['insurance_type']),
                                    'ins_id'  => $insurance_company->id,
                                    'created_by'=> Auth::user()->id 
                                ]);
                }

            }
        }        
         return $error;
    }
}
