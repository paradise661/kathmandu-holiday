<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Social;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data1 = Setting::pluck('value', 'key');
        $data2 = Social::whereStatus(1)->oldest('order')->get();
        View::share('setting', $data1);
        View::share('socialdata', $data2);

        Paginator::useBootstrap();
    }
}