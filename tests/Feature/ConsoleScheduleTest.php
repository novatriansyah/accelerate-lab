<?php

namespace Tests\Feature;

use Illuminate\Console\Scheduling\Schedule;
use Tests\TestCase;

class ConsoleScheduleTest extends TestCase
{
    public function test_queue_worker_schedule_is_configured_and_beautified(): void
    {
        /** @var Schedule $schedule */
        $schedule = $this->app->make(Schedule::class);
        $events = collect($schedule->events());

        $this->assertNotEmpty($events, 'No scheduled events found.');

        $queueEvent = $events->first(function ($event) {
            return str_contains($event->command ?? '', 'queue:work');
        });

        $this->assertNotNull($queueEvent, 'queue:work schedule event was not found.');

        // Must run every minute
        $this->assertEquals('* * * * *', $queueEvent->expression);

        // Must have overlapping prevention
        $this->assertTrue($queueEvent->withoutOverlapping);

        // Must be restricted to one server to prevent duplicate execution
        $this->assertTrue($queueEvent->onOneServer);

        // Must run in background so scheduler does not block
        $this->assertTrue($queueEvent->runInBackground);

        // Must redirect output to scheduler.log to avoid spamming cron debug / stdout
        $this->assertNotNull($queueEvent->output);
        $this->assertStringContainsString('scheduler.log', $queueEvent->output);
    }
}
