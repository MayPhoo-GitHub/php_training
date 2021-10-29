<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Hotel\HotelDaoInterface', 'App\Dao\Hotels\HotelDao');
        $this->app->bind('App\Contracts\Dao\Reservation\ReservationDaoInterface', 'App\Dao\Reservations\ReservationDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Hotel\HotelServiceInterface', 'App\Services\Hotel\HotelService');
        $this->app->bind('App\Contracts\Services\Reservation\ReservationServiceInterface', 'App\Services\Reservation\ReservationService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
