<?php

namespace App\Contracts\Dao\Hotel;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of HOTEL
 */
interface hotelDaoInterface
{
    /**
     * To get Hotel list
     * @return hotels
     */
    public function getHotel();

    /**
     * To import hotel
     * @return import data
     */
    public function importHotels($request);

}