<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use \View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('welcome', 0);
        $keyword = null; $country= null; $city =null; $property = null;
        $price_from= null;$price_to= null;$sort= null;
        View::share('reap_search', compact('keyword', 'country', 'city', 'property', 'price_from', 'price_to', 'sort'));
        $g_keyword = null;  $roi_from = null;  $roi_to = null;
        $g_country = null; 
        View::share('ganp_search', compact('g_keyword', 'roi_from','roi_to','g_country'));
        View::share('page_title', ''); 
        View::share('isAcquisiton', false);
        View::share('isGanp', false);
        View::share('isListAsset', false);
        View::share('isSingleReap', false);
        View::share('isSingleGanp', false);
        View::share('goback', false);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
