<?php

use App\Http\Controllers\API\Reservation\ReservationAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Display All Reservtion
 */
Route::get('/list', [ReservationAPIController::class, 'showReservationList']);

/**
 * Add Reservtion
 */
Route::post('/add', [ReservationAPIController::class, 'addReservation']);

/**
 * delete Reservtion
 */
Route::delete('/delete/{id}', [ReservationAPIController::class, 'deleteReservation']);
Route::get('/edit-view/{id}', [ReservationAPIController::class, 'update']);
Route::post('/edit/{id}', [ReservationAPIController::class, 'updateReservation']);
