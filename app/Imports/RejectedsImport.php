<?php

namespace App\Imports;

use App\Models\Rejected;
use Maatwebsite\Excel\Concerns\ToModel;

class RejectedsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rejected([
            'folder_id'             => $row[0],//c
            'user_id'               => $row[1],//d
            'created_at'            => $row[2],//e
        ]);
    }
}
