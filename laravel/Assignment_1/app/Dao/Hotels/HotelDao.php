<?php

namespace App\Dao\Hotels;

use App\Models\Hotel;
use App\Contracts\Dao\Hotel\hotelDaoInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HotelsImport;

/**
 * Data accessing object for hotel
 */
class HotelDao implements hotelDaoInterface
{
    /**
     * To get hotel
     * @return hotels
     */
    public function getHotel() {
        $hotels = Hotel::orderBy('id', 'asc')->get();
        return $hotels;
    }

    /**
     * To import hotel
     * @return imported data
     */
    public function importHotels($request) {
        Excel::import(new HotelsImport,$request->file('file')); 
        return 'imported';        
    }

}