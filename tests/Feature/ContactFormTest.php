<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function contact_form_can_be_submitted_successfully()
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'company' => 'Acme Corp',
            'phone' => '+1234567890',
            'message' => 'Interested in digital transformation services.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'company' => 'Acme Corp',
        ]);
    }

    #[Test]
    public function contact_form_honeypot_prevents_spam_lead_creation()
    {
        $response = $this->post('/contact', [
            'name' => 'Spam Bot',
            'email' => 'spambot@example.com',
            'my_favorite_color' => 'blue',
            'message' => 'Spam payload',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('leads', [
            'email' => 'spambot@example.com',
        ]);
    }

    #[Test]
    public function contact_form_validates_required_fields()
    {
        $response = $this->post('/contact', [
            'name' => '',
            'email' => 'invalid-email',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
    }
}
