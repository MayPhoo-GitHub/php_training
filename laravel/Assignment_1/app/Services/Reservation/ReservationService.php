<?php

namespace App\Services\Reservation;

use App\Contracts\Dao\Reservation\ReservationDaoInterface;
use App\Contracts\Services\Reservation\ReservationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for Reservation.
 */
class ReservationService implements ReservationServiceInterface
{
    /**
     * post dao
     */
    private $ReservationDao;
    /**
     * Class Constructor
     * @param ReservationDaoInterface
     * @return
     */
    public function __construct(ReservationDaoInterface $ReservationDao)
    {
        $this->ReservationDao = $ReservationDao;
    }

    /**
     * To get Reservation list
     * @return ReservationList
     */
    public function getReservation() {
        return $this->ReservationDao->getReservation();
    }
    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id) {
        return $this->ReservationDao->getReservationById($id);
    }
    /**
     * To save Reservation
     * @param object $request request value to validate
     * @return Object created Reservation object
     */
    public function addReservation($request) {
        return $this->ReservationDao->addReservation($request);
    }
       /**
     * To update Reservation
     * @param object $request request value to validate
     * @return Object created Reservation object
     */
    public function updateReservation($request,$id) {
        return $this->ReservationDao->updateReservation($request,$id);
    }

    /**
     * To delete Reservation
     * @param string $id Reservation id
     * @return 
     */
    public function deleteReservation($id) {
        $this->ReservationDao->deleteReservation($id);
    }
}