<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        VerifyEmail::toMailUsing(function ($notfiable, $url) {
            return (new MailMessage)
            ->subject('تایید ایمیل کاربری')
            ->view('auth.verify_client_mail', compact('url'));
        });
       
    }
}
