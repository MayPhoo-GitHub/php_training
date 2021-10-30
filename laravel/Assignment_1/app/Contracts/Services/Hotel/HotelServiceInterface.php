<?php

namespace App\Contracts\Services\Hotel;
use Illuminate\Http\Request;

/**
 * Interface for hotel service
 */
interface HotelServiceInterface
{
    /**
     * To get hotel list
     * @return hotelList
     */
    public function getHotel();

    public function importHotels($request);

}