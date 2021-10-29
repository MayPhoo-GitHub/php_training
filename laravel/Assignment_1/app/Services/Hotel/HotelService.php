<?php

namespace App\Services\Hotel;

use App\Contracts\Dao\Hotel\HotelDaoInterface;
use App\Contracts\Services\Hotel\HotelServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for Hotel.
 */
class HotelService implements HotelServiceInterface
{
    /**
     * post dao
     */
    private $HotelDao;
    /**
     * Class Constructor
     * @param HotelDaoInterface
     * @return
     */
    public function __construct(HotelDaoInterface $HotelDao)
    {
        $this->HotelDao = $HotelDao;
    }

    /**
     * To get Hotel list
     * @return HotelList
     */
    public function getHotel() {
        return $this->HotelDao->getHotel();
    }
}