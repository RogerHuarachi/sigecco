<?php

namespace App\Imports;

use App\Models\Approved;
use Maatwebsite\Excel\Concerns\ToModel;

class ApprovedsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Approved([
            'folder_id'             => $row[0],//c
            'user_id'               => $row[1],//d
            'created_at'            => $row[2],//e
        ]);
    }
}
