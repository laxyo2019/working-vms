<?php

namespace App\Exports;

use App\Models\TyreModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class TyreModelExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = TyreModel::join('tyre_comp_mast', 'tyre_comp_mast.id', '=', 'tyre_model_mast.comp_id')->where('tyre_model_mast.fleet_code',$fleet_code);
 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->comp_name,$comp->model_name];
    }

    public function headings(): array
    {
        return ['Tyre Company Name','Tyre Model Name'];
    }
}
