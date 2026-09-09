<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\HomepageStatResource;
use App\Filament\Resources\JobPostingResource;
use App\Filament\Resources\LeadResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\ServiceResource;
use App\Filament\Resources\SiteSettingResource;
use App\Filament\Resources\TeamMemberResource;
use App\Filament\Resources\TestimonialResource;
use Tests\TestCase;

class PrunedCmsNavigationTest extends TestCase
{
    public function test_pruned_resources_no_longer_exist_in_cms(): void
    {
        $this->assertFileDoesNotExist(app_path('Filament/Resources/TechnologyResource.php'));
        $this->assertFileDoesNotExist(app_path('Filament/Resources/DemoResource.php'));
        $this->assertFileDoesNotExist(app_path('Filament/Resources/CompanyMilestoneResource.php'));
        $this->assertFileDoesNotExist(app_path('Filament/Resources/CoreValueResource.php'));
    }

    public function test_essential_resources_are_configured_with_business_navigation_groups(): void
    {
        $this->assertTrue(class_exists(LeadResource::class));
        $this->assertTrue(class_exists(ServiceResource::class));
        $this->assertTrue(class_exists(ProjectResource::class));
        $this->assertTrue(class_exists(TestimonialResource::class));
        $this->assertTrue(class_exists(ArticleResource::class));
        $this->assertTrue(class_exists(CategoryResource::class));
        $this->assertTrue(class_exists(SiteSettingResource::class));
        $this->assertTrue(class_exists(TeamMemberResource::class));
        $this->assertTrue(class_exists(HomepageStatResource::class));
        $this->assertTrue(class_exists(JobPostingResource::class));

        $this->assertEquals('Inbox & Calon Klien', LeadResource::getNavigationGroup());
        $this->assertEquals('Solusi & Portofolio', ServiceResource::getNavigationGroup());
        $this->assertEquals('Solusi & Portofolio', ProjectResource::getNavigationGroup());
        $this->assertEquals('Solusi & Portofolio', TestimonialResource::getNavigationGroup());
        $this->assertEquals('Wawasan & Publikasi', ArticleResource::getNavigationGroup());
        $this->assertEquals('Wawasan & Publikasi', CategoryResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', SiteSettingResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', TeamMemberResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', HomepageStatResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', JobPostingResource::getNavigationGroup());
    }
}
