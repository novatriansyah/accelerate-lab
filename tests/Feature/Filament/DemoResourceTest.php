<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\DemoResource;
use App\Models\Demo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoResourceTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    #[Test]
    public function demo_resource_configuration_and_navigation_are_valid()
    {
        $this->assertEquals(Demo::class, DemoResource::getModel());
        $this->assertEquals('Showcase & Demos', DemoResource::getNavigationGroup());
        $this->assertEquals('heroicon-o-presentation-chart-line', DemoResource::getNavigationIcon());
        $this->assertArrayHasKey('index', DemoResource::getPages());
        $this->assertArrayHasKey('create', DemoResource::getPages());
        $this->assertArrayHasKey('edit', DemoResource::getPages());
    }

    #[Test]
    public function demo_resource_can_create_new_record()
    {
        $this->actingAs($this->admin);

        Livewire::test(DemoResource\Pages\CreateDemo::class)
            ->fillForm([
                'title' => 'New Enterprise Portal',
                'slug' => 'new-enterprise-portal',
                'client_name' => 'Mega Corp',
                'industry' => 'Enterprise',
                'html_content' => '<!DOCTYPE html><html><body><h1>Mega Corp</h1></body></html>',
                'is_active' => true,
                'default_device' => 'desktop',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('demos', [
            'slug' => 'new-enterprise-portal',
            'client_name' => 'Mega Corp',
        ]);
    }

    #[Test]
    public function demo_resource_can_edit_existing_record()
    {
        $this->actingAs($this->admin);

        $demo = Demo::factory()->create([
            'title' => 'Initial Demo Title',
        ]);

        Livewire::test(DemoResource\Pages\EditDemo::class, [
            'record' => $demo->getRouteKey(),
        ])
            ->fillForm([
                'title' => 'Updated Demo Title',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('demos', [
            'id' => $demo->id,
            'title' => 'Updated Demo Title',
        ]);
    }
}
