<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

$schedulerLog = storage_path('logs/scheduler.log');

Schedule::command('queue:work --stop-when-empty')
    ->name('queue:work')
    ->everyMinute()
    ->withoutOverlapping()
    ->onOneServer()
    ->runInBackground()
    ->appendOutputTo($schedulerLog)
    ->onFailure(function () {
        \Illuminate\Support\Facades\Log::error('Scheduled job failed: queue:work');
    });
