<?php

namespace Tests\Unit;

use App\Models\Project;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    #[Test]
    public function project_plain_challenge_accessor_strips_html_tags()
    {
        $project = new Project([
            'challenge' => '<p>This is a <strong>complex</strong> challenge &amp; requirement.</p>',
        ]);

        $this->assertEquals('This is a complex challenge & requirement.', $project->plain_challenge);
    }

    #[Test]
    public function project_plain_solution_accessor_strips_html_tags()
    {
        $project = new Project([
            'solution' => '<div>Built with <span class="highlight">Laravel 12</span> architecture.</div>',
        ]);

        $this->assertEquals('Built with Laravel 12 architecture.', $project->plain_solution);
    }

    #[Test]
    public function project_casts_attributes_properly()
    {
        $project = new Project([
            'technology_tags' => ['Laravel', 'Tailwind CSS', 'Alpine.js'],
            'stats' => [['value' => '99.9%', 'label' => 'Uptime']],
            'is_featured' => 1,
        ]);

        $this->assertIsArray($project->technology_tags);
        $this->assertCount(3, $project->technology_tags);
        $this->assertIsArray($project->stats);
        $this->assertTrue($project->is_featured);
    }
}
