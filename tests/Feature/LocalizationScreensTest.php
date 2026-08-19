<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LocalizationScreensTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_all_sections_render_indonesian_translations()
    {
        Project::create([
            'title' => 'Fintech Engine',
            'slug' => 'fintech-engine',
            'description' => 'Fast payment system',
            'challenge' => 'Legacy payment bottlenecks',
            'solution' => 'High throughput microservices',
            'industry' => 'Fintech',
            'is_active' => true,
            'is_featured' => true,
            'order' => 1,
        ]);

        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('Cara Kami Bekerja');
        $response->assertSee('Proyek Terbaru Kami');
        $response->assertSee('Estimasi Proyek Anda');
        $response->assertSee('Konsultasi Gratis 15-Menit');
        $response->assertSee('Kapabilitas Utama');
        $response->assertSee('Strategi Produk');
        $response->assertSee('Pengembangan Kustom');
        $response->assertSee('Pelajari selengkapnya');
        $response->assertSee('Langkah 1');
        $response->assertSee('Eksplorasi');
        $response->assertSee('Tantangan');
        $response->assertSee('Solusi');
        $response->assertSee('Siap Mengakselerasi?');
    }

    #[Test]
    public function services_index_renders_indonesian_translations()
    {
        Service::create([
            'title' => 'Web App Development',
            'slug' => 'web-app-development',
            'short_description' => 'Scalable web apps',
            'description' => 'Full stack web applications',
            'is_active' => true,
            'order' => 1,
        ]);

        $response = $this->withSession(['locale' => 'id'])->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Inovasi Digital, Terwujud Nyata.');
        $response->assertSee('Metodologi Kami');
        $response->assertSee('Estimasi Proyek Anda');
    }

    #[Test]
    public function case_studies_index_renders_indonesian_translations()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/case-studies');
        $response->assertStatus(200);
        $response->assertSee('Rekayasa Masa Depan');
        $response->assertSee('Semua Industri');
        $response->assertSee('Solusi Digital Terdepan');
    }

    #[Test]
    public function about_page_renders_indonesian_translations_and_preserves_executive_titles()
    {
        TeamMember::create([
            'name' => 'Nova Triansyah',
            'role' => 'CEO & Founder',
            'bio' => 'Principal Architect',
            'sort_order' => 1,
        ]);

        $response = $this->withSession(['locale' => 'id'])->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Arsitek Inovasi Digital');
        $response->assertSee('Bergabung Bersama Kami');
        // Executive position remains familiar professional title in Indonesian context
        $response->assertSee('CEO & Founder');
    }

    #[Test]
    public function blog_index_renders_indonesian_translations()
    {
        $author = User::factory()->create();
        $category = Category::create(['name' => 'Engineering', 'slug' => 'engineering']);
        Article::create([
            'user_id' => $author->id,
            'category_id' => $category->id,
            'title' => 'Test Article',
            'slug' => 'test-article',
            'content' => 'Content here',
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        $response = $this->withSession(['locale' => 'id'])->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Artikel & Wawasan Teknologi');
    }

    #[Test]
    public function careers_page_renders_indonesian_translations_and_cms_job_metadata()
    {
        JobPosting::create([
            'title' => 'Senior Backend Engineer',
            'slug' => 'senior-backend-engineer',
            'location' => 'Remote',
            'type' => 'Full-time',
            'department' => 'Engineering',
            'description' => 'Join us',
            'is_active' => true,
        ]);

        $response = $this->withSession(['locale' => 'id'])->get('/careers');
        $response->assertStatus(200);
        $response->assertSee('Bergabung Bersama Kami');
        $response->assertSee('Penuh Waktu');
        $response->assertSee('Rekayasa Perangkat Lunak');
    }

    #[Test]
    public function contact_page_renders_indonesian_translations()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Hubungi Kami');
        $response->assertSee('Mari Bangun');
        $response->assertSee('Kunjungi Kantor');
        $response->assertSee('Kirim Email');
        $response->assertSee('Telepon Kami');
    }

    #[Test]
    public function terms_of_service_renders_english_content()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/terms-of-service');
        $response->assertStatus(200);
        $response->assertSee('Terms of Service');
        $response->assertSee('1. Agreement to Terms');
    }

    #[Test]
    public function privacy_policy_renders_english_content()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/privacy-policy');
        $response->assertStatus(200);
        $response->assertSee('Privacy Policy');
        $response->assertSee('Personal Information');
    }

    #[Test]
    public function project_detail_renders_indonesian_translations()
    {
        $project = Project::create([
            'title' => 'E-Commerce Engine',
            'slug' => 'ecommerce-engine',
            'description' => 'Scalable storefront',
            'challenge' => 'Slow checkout',
            'solution' => 'Micro frontend architecture',
            'industry' => 'E-Commerce',
            'client' => 'Retail Corp',
            'is_active' => true,
            'is_featured' => true,
            'order' => 1,
        ]);

        $response = $this->withSession(['locale' => 'id'])->get('/case-studies/' . $project->slug);
        $response->assertStatus(200);
        $response->assertSee('Klien');
        $response->assertSee('Tantangan Proyek');
        $response->assertSee('Solusi Rekayasa');
        $response->assertSee('E-Commerce');
    }
}

