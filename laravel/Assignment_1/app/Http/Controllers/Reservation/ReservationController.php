<?php

namespace App\Http\Controllers\Reservation;

use App\Contracts\Services\Hotel\HotelServiceInterface;
use App\Contracts\Services\Reservation\ReservationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use App\Mail\NewReservation;
use Illuminate\Support\Facades\Mail;

/**
 * This is Reservation controller.
 */
class ReservationController extends Controller
{
    /**
     * Reservation interface,hotel interface
     */
    private $ReservationInterface;
    private $HotelInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReservationServiceInterface $ReservationServiceInterface, HotelServiceInterface $HotelServiceInterface)
    {
        $this->ReservationInterface = $ReservationServiceInterface;
        $this->HotelInterface = $HotelServiceInterface;
    }
    

    /**
     * To show Reservation list
     *
     * @return View Reservation list
     */
    public function showReservationList()
    {
        $ReservationList = $this->ReservationInterface->getReservation();
        $hotels = $this->HotelInterface->getHotel();
        return view('reservations', [
            'reservations' => $ReservationList,
            'hotels' =>$hotels
        ]);
    }

    /**
     * To add Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function addReservation(ReservationRequest $request) {
        $validated = $request->validated();
        $Reservation = $this->ReservationInterface->addReservation($request);
        return redirect('/reservation/mail');
    }

        /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation 
     */
    public function update($id) {
        $reservation = $this->ReservationInterface->getReservationById($id);
        $hotels = $this->HotelInterface->getHotel();
        return view('update',[
            'reservation'=> $reservation,
            'hotels' =>$hotels
        ]);
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function updateReservation(ReservationRequest $request,$id) {
        $validated = $request->validated();
        $Reservation = $this->ReservationInterface->updateReservation($request,$id);
        return redirect('/');
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservation($id) {
        $this->ReservationInterface->deleteReservation($id);
        return redirect('/');
    }

    /**
     * To export Reservation
     * @return View Reservation
     */
    public function exportReservation() {
        return $this->ReservationInterface->exportReservation();
    }

    /**
     * To display search form
     * @return View Reservation
     */
    public function searchForm() {
        $reservations = $this->ReservationInterface->getReservation();
        return view('search', ['reservations' => $reservations]);
    }

    /**
     * To search Reservation
     * @return View Reservation
     */
    public function searchReservation(Request $request) {
        $reservations = $this->ReservationInterface->searchReservation($request);
        return view('search', ['reservations' => $reservations]);
    }
    
    /**
     * To Send Mail
     */
    public function NewReservation()
    {
        $data = [
            'title' => '[new reservation added]',
            'body' => 'New reservation record is send to admin by email'
        ];
        Mail::to('mayphoowai@gmail.com')->send(new NewReservation($data));       
    }

}