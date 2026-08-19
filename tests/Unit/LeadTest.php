<?php

namespace Tests\Unit;

use App\Enums\LeadStatus;
use App\Models\Lead;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class LeadTest extends TestCase
{
    #[Test]
    public function lead_title_accessor_returns_name()
    {
        $lead = new Lead(['name' => 'Nova Triansyah']);

        $this->assertEquals('Nova Triansyah', $lead->title);
    }

    #[Test]
    public function lead_description_accessor_returns_company_or_fallback()
    {
        $leadWithCompany = new Lead(['name' => 'John', 'company' => 'Acme Corp']);
        $this->assertEquals('Acme Corp', $leadWithCompany->description);

        $leadWithoutCompany = new Lead(['name' => 'Jane']);
        $this->assertEquals('No Company', $leadWithoutCompany->description);
    }

    #[Test]
    public function lead_casts_status_to_lead_status_enum()
    {
        $lead = new Lead(['status' => 'new']);
        $this->assertInstanceOf(LeadStatus::class, $lead->status);
        $this->assertEquals(LeadStatus::New, $lead->status);
        $this->assertEquals('New', $lead->status->getLabel());
        $this->assertEquals('info', $lead->status->getColor());
    }
}
