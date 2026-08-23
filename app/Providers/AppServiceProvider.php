<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Notification::extend('whatsapp', function ($app) {
            return new \App\Channels\WhatsAppChannel;
        });

        try {
            \Illuminate\Support\Facades\View::composer('*', function ($view) {
                $settings = Cache::remember('site_settings', 300, function () {
                    if (!\Illuminate\Support\Facades\Schema::hasTable('site_settings')) {
                        return collect();
                    }
                    return \App\Models\SiteSetting::where('is_display', true)->pluck('value', 'key');
                });
                $view->with('settings', $settings);

                $globalServices = Cache::remember('global_services', 300, function () {
                    if (!\Illuminate\Support\Facades\Schema::hasTable('services')) {
                        return collect();
                    }
                    return \App\Models\Service::orderBy('sort_order')->get(['title', 'slug']);
                });
                $view->with('globalServices', $globalServices);
            });
        } catch (\Exception $e) {
            // Failsafe for initial migration
        }
    }
}
