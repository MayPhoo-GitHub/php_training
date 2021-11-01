<?php

namespace App\Contracts\Dao\Reservation;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface ReservationDaoInterface
{
    /**
     * To get reservationlist
     * @return reservations
     */
    public function getReservation();

    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id);

    /**
     * To save reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function addReservation($request);
    
    /**
     * To update reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function updateReservation($request,$id);

    /**
     * To delete reservation
     * @param string $id reservation id
     * @return 
     */
    public function deleteReservation($id);

    /**
     * To export reservation
     */
    public function exportReservation();

    /**
     * To show search reservation
     */
    public function searchReservation($request);
}