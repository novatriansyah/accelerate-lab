<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

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
        Notification::extend('whatsapp', function ($app) {
            return new \App\Channels\WhatsAppChannel();
        });

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('site_settings')) {
                \Illuminate\Support\Facades\View::share('settings', \App\Models\SiteSetting::where('is_display', true)->pluck('value', 'key'));
            }
            if (\Illuminate\Support\Facades\Schema::hasTable('services')) {
                \Illuminate\Support\Facades\View::share('globalServices', \App\Models\Service::orderBy('sort_order')->get(['title', 'slug']));
            }
        } catch (\Exception $e) {
            // Failsafe for initial migration
        }
    }
}
