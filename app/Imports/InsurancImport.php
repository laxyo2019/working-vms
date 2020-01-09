<?php

namespace App\Imports;

use App\Models\InsuranceCompany;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use Auth;

class InsurancImport implements ToCollection,WithHeadingRow
{    
    public function collection(Collection $rows)
    {  
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {

            $data = InsuranceCompany::where('fleet_code',$fleet_code)->where('comp_name',$row['insurance_company'])->first();
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['insurance_company']))                
            {    
               if($data == null){
               InsuranceCompany::create(['fleet_code' => $row['fleet_code'],
                                        'comp_name'   => ucfirst($row['insurance_company']),
                                        //'comp_phone'  => $row['company_phone'] ? $row['company_phone'] : '' ,
                                        //'comp_email'  => $email,
                                        'created_by'  => Auth::user()->id
                                        ]);
                }                  

            }
        }
        
         return $error;
    }
}
