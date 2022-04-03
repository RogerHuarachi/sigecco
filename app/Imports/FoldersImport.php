<?php

namespace App\Imports;

use App\Models\Folder;
use Maatwebsite\Excel\Concerns\ToModel;

class FoldersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Folder([
            'name'          => $row[0],//a
            'money'         => $row[1],//b
            'term'          => $row[2],//c
            'gender'        => $row[3],//d
            'report'        => $row[4],//e
            'user_id'       => $row[5],//g
            'created_at'    => $row[6],//h
        ]);
    }
}
