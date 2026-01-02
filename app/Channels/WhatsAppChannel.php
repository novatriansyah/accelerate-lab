<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class WhatsAppChannel
{
    /**
     * Send the given notification.
     */
    public function send($notifiable, Notification $notification): void
    {
        if (method_exists($notification, 'toWhatsapp')) {
            $notification->toWhatsapp($notifiable);
        }
    }
}
