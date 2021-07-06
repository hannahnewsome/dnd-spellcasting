<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('str_ordinal', function ($value, $superscript = false) {
            $number = abs($value);
 
            $indicators = ['th','st','nd','rd','th','th','th','th','th','th'];
     
            $suffix = $superscript ? '<sup>' . $indicators[$number % 10] . '</sup>' : $indicators[$number % 10];
            if ($number % 100 >= 11 && $number % 100 <= 13) {
                $suffix = $superscript ? '<sup>th</sup>' : 'th';
            }
     
            return number_format($number) . $suffix;
        });
    }
}
