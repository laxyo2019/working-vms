<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\vch_comp;
use Auth;

class VehicleImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        //dd($rows);
        $fleet_code =session('fleet_code');        
        $data = array();
        foreach ($rows as $row) {
            $company = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['vehicle_company'])->get();
            $count = count($company);

           if($count ==0)                
            {  
            if($row['vehicle_company'] != null){
            vch_comp::create(['fleet_code'    => session('fleet_code'),
                                     'comp_name'  => ucfirst($row['vehicle_company']),
                                     //'comp_desc'  => $row['description'],
                                     'created_by' => Auth::user()->id
                                    ]);    
                 
                    }       
            }
    }
}
}