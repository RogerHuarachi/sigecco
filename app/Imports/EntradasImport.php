<?php

namespace App\Imports;

use App\Models\Agency;
use App\Models\Arqueo;
use App\Models\Entrada;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class EntradasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $agency = Agency::where('codigo', $row[0])->firstOrFail();
        $date = Carbon::now()->format('Y-m-d');

        $arqueo = Arqueo::where('date', $date)->where('agency_id', $agency->id)->firstOrFail();
        return new Entrada([
            'arqueo_id'             => $arqueo->id,
            'category'              => $row[1],//b
            'item'                  => $row[2],//c
            'money'                 => $row[3],//d
        ]);
    }
}
