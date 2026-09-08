<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FaqSectionTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_renders_objection_busting_faq_section()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pertanyaan yang Sering Diajukan');
        $response->assertSee('Apakah ada biaya langganan bulanan tersembunyi?');
        $response->assertSee('Berapa lama waktu pengerjaannya?');
        $response->assertSee('Siapa yang memegang hak cipta source code dan database?');
        $response->assertSee('Apakah kerja sama dilengkapi kontrak dan legalitas resmi?');
    }

    #[Test]
    public function contact_page_contains_faq_reference()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Pertanyaan Umum');
    }
}
