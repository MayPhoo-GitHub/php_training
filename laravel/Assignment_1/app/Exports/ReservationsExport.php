<?php

namespace App\Exports;

use App\Models\Reservations;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservations::all();
    }

    /**
    * @return table heading
    */
    public function headings() :array {
        return ['Id','Hotel Name','Number Of Guests','Arrival','Departure','Created at','Updated at','Deleted at'];
    }
}
