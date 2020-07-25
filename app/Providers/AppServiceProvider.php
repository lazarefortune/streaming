<?php

namespace App\Providers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
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
         //
         Carbon::setLocale('fr');
     }

     /**
      * Bootstrap any application services.
      *
      * @return void
      */
     public function boot()
     {
         //
         Schema::defaultStringLength(191);
     }
}
