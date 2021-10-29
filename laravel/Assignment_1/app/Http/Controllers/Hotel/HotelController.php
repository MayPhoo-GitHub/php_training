<?php

namespace App\Http\Controllers\Hotel;

use App\Contracts\Services\Hotel\HotelServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use Illuminate\Http\Request;

/**
 * This is Hotel controller.
 */
class HotelController extends Controller
{
    /**
     * Hotel interface
     */
    private $HotelInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HotelServiceInterface $HotelServiceInterface)
    {
        $this->HotelInterface = $HotelServiceInterface;
    }

    /**
     * To show Hotel list
     *
     * @return View Hotel list
     */
    public function showHotelList()
    {
        $HotelList = $this->HotelInterface->getHotel();
        return view('hotel', [
            'hotels' => $HotelList
        ]);
    }

}