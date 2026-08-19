<?php

namespace Tests\Unit;

use App\Mail\NewLeadReceived;
use App\Models\Lead;
use App\Models\User;
use App\Notifications\LeadNotification;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LeadNotificationTest extends TestCase
{
    #[Test]
    public function lead_notification_specifies_mail_and_whatsapp_channels()
    {
        $lead = new Lead([
            'name' => 'Nova Azis',
            'email' => 'nova@example.com',
            'message' => 'Need consultation for fintech platform.',
        ]);

        $notification = new LeadNotification($lead);
        $user = new User(['email' => 'admin@acceleratelab.id']);

        $channels = $notification->via($user);

        $this->assertContains('mail', $channels);
        $this->assertContains('whatsapp', $channels);
    }

    #[Test]
    public function lead_notification_creates_proper_mail_message()
    {
        $lead = new Lead([
            'name' => 'Nova Azis',
            'email' => 'nova@example.com',
            'company' => 'PT Accelerate',
            'phone' => '+62812345678',
            'message' => 'Looking for scalable agency services.',
        ]);

        $notification = new LeadNotification($lead);
        $user = new User(['email' => 'admin@acceleratelab.id']);

        $mailable = $notification->toMail($user);

        $this->assertInstanceOf(NewLeadReceived::class, $mailable);
        $this->assertTrue($mailable->hasTo('admin@acceleratelab.id'));
    }
}
