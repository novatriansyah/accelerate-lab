<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function blog_index_displays_published_articles_and_featured_post()
    {
        $featured = Article::factory()->featured()->create([
            'title' => 'Featured Article Title',
        ]);

        $latest = Article::factory()->count(3)->create();

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('Featured Article Title');
        $response->assertSee($latest->first()->title);
    }

    #[Test]
    public function article_detail_page_displays_content()
    {
        $article = Article::factory()->create([
            'title' => 'Deep Dive into Cloud Architecture',
        ]);

        $response = $this->get('/blog/' . $article->slug);

        $response->assertStatus(200);
        $response->assertSee('Deep Dive into Cloud Architecture');
    }

    #[Test]
    public function draft_or_future_article_returns_404()
    {
        $draftArticle = Article::factory()->draft()->create([
            'title' => 'Future Post',
        ]);

        $response = $this->get('/blog/' . $draftArticle->slug);

        $response->assertStatus(404);
    }
}
