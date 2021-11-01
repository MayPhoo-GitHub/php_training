<?php

namespace App\Imports;

use App\Models\Hotel;
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
        return new Hotel([
            'hotel_name'     => $row['hotel_name'],
            'location'       => $row['location'],
            'description'    => $row['description'], 
        ]);
    }
}
