<?php

namespace App\Http\Controllers\API\Reservation;

use App\Contracts\Services\Reservation\ReservationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

/**
 * This is Reservation controller.
 */
class ReservationAPIController extends Controller
{
    /**
     * Reservation interface
     */
    private $ReservationInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReservationServiceInterface $ReservationServiceInterface)
    {
        $this->ReservationInterface = $ReservationServiceInterface;
    }
    

    /**
     * To show Reservation list
     *
     * @return View Reservation list
     */
    public function showReservationList()
    {
        $ReservationList = $this->ReservationInterface->getReservation();
        return response()->json($ReservationList);
    }

    
    /**
     * To add Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function addReservation(Request $request) {
        $Reservation = $this->ReservationInterface->addReservation($request);
        return response()->json($Reservation);
    }

        /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation 
     */
    public function update($id) {
        $reservation = $this->ReservationInterface->getReservationById($id);
        return response()->json($reservation);
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function updateReservation(Request $request,$id) {
        $Reservation = $this->ReservationInterface->updateReservation($request,$id);
        return response()->json($Reservation);
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservation($id) {
        $this->ReservationInterface->deleteReservation($id);
        return response()->json();
    }


}