<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class CarbonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        include_once('vendor/jdf/jdf.php');
        Carbon::setLocale('fa_IR');
        Carbon::macro('jdate',function($format,$tr_num='fa'){
            return jdate($format,self::this()->timestamp,'','',$tr_num);
        });
        
        // Carbon::macro('jdate', function ($format, $tr_num = 'fa') {
        //     return jdate($format, self::this()->timestamp, '', '', $tr_num);
        // });

        // Carbon::macro('jmktime', function ($year, $month, $day, $hour = 0, $minute = 0, $second = 0) {
        //     $timestamp = jmktime($hour, $minute, $second, $month, $day, $year);
        //     return self::createFromTimestamp($timestamp);
        // });
    }
}
