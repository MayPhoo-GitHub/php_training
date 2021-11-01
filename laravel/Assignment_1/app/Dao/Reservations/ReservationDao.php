<?php

namespace App\Dao\Reservations;

use App\Models\Reservation;
use App\Contracts\Dao\Reservation\ReservationDaoInterface;
use App\Exports\ReservationsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

/**
 * Data accessing object for reservation
 */
class ReservationDao implements ReservationDaoInterface
{
    /**
     * To get reservation
     * @return reservations
     */
    public function getReservation() {
        $reservations = Reservation::orderBy('created_at', 'asc')->get();
        return $reservations;
    }

    
    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id) {
        $reservation = Reservation::FindorFail($id);
        return $reservation;
    }


    /**
     * To save reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function addReservation($request) {    
        $reservations = new Reservation();
        $reservations->hotel_name = $request->name;
        $reservations->num_of_guests = $request->guest;
        $reservations->arrival = $request->arrival;
        $reservations->departure = $request->departure;
        $reservations->save();    
        return $reservations;
    }
     /**
     * To update reservation
     * @param string $id reservation id
     * @return 
     */
    public function updateReservation($request,$id) {
        $reservations = Reservation::FindorFail($id);
        $reservations->hotel_name = $request->name;
        $reservations->num_of_guests = $request->guest;
        $reservations->arrival = $request->arrival;
        $reservations->departure = $request->departure;
        $reservations->save();    
        return $reservations;
    }
    /**
     * To delete reservation
     * @param string $id reservation id
     * @return 
     */
    public function deleteReservation($id) {
        Reservation::findOrFail($id)->delete();
    }
    /**
    * To export reservation
    */
    public function exportReservation() 
    {
        return Excel::download(new ReservationsExport,'Reservations.xlsx');
    }
}