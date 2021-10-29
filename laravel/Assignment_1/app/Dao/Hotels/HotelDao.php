<?php

namespace App\Dao\Hotels;

use App\Models\Hotels;
use App\Contracts\Dao\Hotel\hotelDaoInterface;
use Illuminate\Http\Request;

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
        $hotels = Hotels::orderBy('id', 'asc')->get();
        return $hotels;
    }

}