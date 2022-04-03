<?php

namespace App\Imports;

use App\Models\Observed;
use Maatwebsite\Excel\Concerns\ToModel;

class ObservedsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Observed([
            'folder_id'             => $row[0],//c
            'user_id'               => $row[1],//d
            'created_at'            => $row[2],//e
        ]);
    }
}
