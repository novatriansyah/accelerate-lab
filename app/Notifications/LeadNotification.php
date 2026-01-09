<?php

namespace App\Notifications;

use App\Mail\NewLeadReceived;
use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LeadNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $lead;

    /**
     * Create a new notification instance.
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'whatsapp']; // Custom channel
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new NewLeadReceived($this->lead))->to($notifiable->email);
    }

    /**
     * Custom driver for WhatsApp (CallMeBot or similar webhook).
     */
    public function toWhatsapp($notifiable)
    {
        $webhookUrl = config('services.whatsapp.webhook_url');

        if (! $webhookUrl) {
            Log::info('WhatsApp Webhook URL not configured. Skipping WhatsApp notification for lead: ' . $this->lead->id);

            return;
        }

        $message = 'New Lead: ' . $this->lead->name . ' (' . $this->lead->email . ') - ' . substr($this->lead->message, 0, 50) . '...';

        try {
            // Example for a generic webhook. Adapters for specific providers can be added here.
            Http::post($webhookUrl, [
                'text' => $message,
                'chat_id' => config('services.whatsapp.chat_id'), // Optional, depending on provider
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp notification: ' . $e->getMessage());
        }
    }
}
