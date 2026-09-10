<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenGraphSocialMetaTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_complete_default_opengraph_and_twitter_tags(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // OpenGraph protocol tags
        $response->assertSee('<meta property="og:site_name" content="Accelerate Lab">', false);
        $response->assertSee('<meta property="og:type" content="website">', false);
        $response->assertSee('<meta property="og:title" content="Accelerate Lab - Digital Innovation Agency">', false);
        $response->assertSee('<meta property="og:url" content="http://localhost">', false);
        $response->assertSee('<meta property="og:image" content="http://localhost/images/og-cover.png">', false);
        $response->assertSee('<meta property="og:image:secure_url" content="http://localhost/images/og-cover.png">', false);
        $response->assertSee('<meta property="og:image:width" content="1200">', false);
        $response->assertSee('<meta property="og:image:height" content="630">', false);
        $response->assertSee('<meta property="og:image:type" content="image/png">', false);

        // Twitter Card tags
        $response->assertSee('<meta name="twitter:card" content="summary_large_image">', false);
        $response->assertSee('<meta name="twitter:title" content="Accelerate Lab - Digital Innovation Agency">', false);
        $response->assertSee('<meta name="twitter:image" content="http://localhost/images/og-cover.png">', false);
    }

    public function test_article_page_renders_article_og_type_and_custom_image(): void
    {
        $author = \App\Models\User::factory()->create();
        $category = \App\Models\Category::factory()->create();
        $article = \App\Models\Article::factory()->create([
            'title' => 'Building Fast Laravel Monoliths',
            'slug' => 'fast-laravel-monoliths',
            'image_path' => 'articles/cover-sample.jpg',
            'user_id' => $author->id,
            'category_id' => $category->id,
            'published_at' => now()->subHour(),
        ]);

        $response = $this->get("/blog/{$article->slug}");

        $response->assertStatus(200);
        $response->assertSee('<meta property="og:type" content="article">', false);
        $response->assertSee('Building Fast Laravel Monoliths', false);
        $response->assertSee('cover-sample.jpg', false);
    }

    public function test_project_page_renders_custom_og_image_when_available(): void
    {
        $project = \App\Models\Project::factory()->create([
            'title' => 'Telaah LegalTech Platform',
            'slug' => 'telaah-legaltech',
            'image_path' => 'projects/telaah-preview.jpg',
        ]);

        $response = $this->get("/case-studies/{$project->slug}");

        $response->assertStatus(200);
        $response->assertSee('Telaah LegalTech Platform', false);
        $response->assertSee('telaah-preview.jpg', false);
    }
}
