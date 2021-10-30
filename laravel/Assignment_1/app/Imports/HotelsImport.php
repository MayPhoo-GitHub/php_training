<?php

namespace App\Imports;

use App\Models\Hotels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HotelsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hotels([
            'hotel_name'     => $row['hotel_name'],
            'location'       => $row['location'],
            'description'    => $row['description'], 
        ]);
    }
}
