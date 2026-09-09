<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class TheLabRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function the_lab_view_compiles_cleanly_without_em_dashes()
    {
        $view = $this->view('frontend.pages.the-lab');

        $view->assertSee('the-lab-hero-section');
        $view->assertSee('lab-experiments-grid');

        $content = (string) $view;
        $this->assertStringNotContainsString('—', $content, 'Found em-dash in the-lab view');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash in the-lab view');
    }

    #[Test]
    public function the_lab_route_redirects_cleanly_to_blog()
    {
        $response = $this->get('/the-lab');
        $response->assertRedirect('/blog');
    }
}
