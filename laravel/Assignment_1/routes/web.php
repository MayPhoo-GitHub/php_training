<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Hotel\HotelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/**
 * Display All Hotels
 */
Route::get('/show-hotel', [HotelController::class, 'showHotelList']);

/**
 * Import Hotel
 */
Route::post('/import-hotel', [HotelController::class, 'importHotels']);


/**
 * Display All Reservtion
 */
Route::get('/', [ReservationController::class, 'showReservationList']);

/**
 * Add A New Reservation
 */
Route::post('/reservation', [ReservationController::class, 'addReservation']);

/**
 * Update Reservation Form
 */
Route::post('/update/{id}', [ReservationController::class, 'update']);

/**
 * Update Reservation 
 */
Route::post('/updateReservation/{id}', [ReservationController::class, 'updateReservation']);
/**
 * Delete An Existing Reservation
 */
Route::delete('/reservation/{id}', [ReservationController::class, 'deleteReservation']);

/**
 * Export Reservation
 */
Route::get('/export-reservation', [ReservationController::class, 'exportReservation']);