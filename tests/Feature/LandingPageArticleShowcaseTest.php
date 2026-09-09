<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageArticleShowcaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_latest_published_articles(): void
    {
        $user = User::factory()->create(['name' => 'Nova Triansyah Azis']);
        $category = Category::create(['name' => 'Architecture Strategy', 'slug' => 'architecture-strategy']);

        Article::create([
            'title' => 'Modern Monolithic Scalability Insights',
            'slug' => 'modern-monolithic-scalability-insights',
            'content' => '<p>Practical benchmarks for high throughput systems.</p>',
            'published_at' => now()->subDay(),
            'user_id' => $user->id,
            'category_id' => $category->id,
            'is_featured' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Modern Monolithic Scalability Insights');
        $response->assertSee('Architecture Strategy');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
