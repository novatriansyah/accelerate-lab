<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCentricCompanyPagesCopyTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_pages_are_free_of_tech_stack_jargon(): void
    {
        $routes = ['/about', '/case-studies', '/contact', '/careers', '/blog'];
        $forbidden = ['Laravel', 'Vue.js', 'Alpine.js', 'Livewire', 'Kubernetes', 'Docker', 'React Native'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            foreach ($forbidden as $tech) {
                $response->assertDontSee($tech, false);
            }
            $response->assertDontSee('—', false);
            $response->assertDontSee('–', false);
        }
    }

    public function test_about_and_contact_affirm_corporate_credibility(): void
    {
        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('PT Akselerasi Digital Mandiri', false);

        $contactResponse = $this->get('/contact');
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('PT Akselerasi Digital Mandiri', false);
        $contactResponse->assertSee('Consultation', false);
    }

    public function test_case_study_detail_page_is_customer_centric(): void
    {
        $project = Project::create([
            'title' => 'Enterprise Core Commerce Platform',
            'slug' => 'enterprise-core-commerce',
            'client' => 'PT Ritel Multi Niaga',
            'industry' => 'Omnichannel Retail',
            'description' => 'Transformasi platform transaksi dan otomasi pergudangan terintegrasi.',
            'challenge' => 'Sistem lama mengalami lonjakan kegagalan transaksi pada kampanye kilat.',
            'solution' => 'Pembaruan arsitektur transaksi real-time dengan skalabilitas tinggi.',
            'stats' => [
                ['value' => '99.99%', 'label' => 'Uptime Transaksi'],
                ['value' => '3.5x', 'label' => 'Pertumbuhan Konversi'],
            ],
            'technology_tags' => ['High Throughput API', 'Realtime Queue', 'Zero Downtime'],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        $response = $this->get('/case-studies/' . $project->slug);
        $response->assertStatus(200);
        $response->assertSee('Enterprise Core Commerce Platform', false);
        $response->assertSee('PT Ritel Multi Niaga', false);
        $response->assertDontSee('Docker', false);
        $response->assertDontSee('Kubernetes', false);
        $response->assertDontSee('Laravel', false);
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
