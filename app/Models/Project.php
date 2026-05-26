<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'client',
        'industry',
        'description',
        'challenge',
        'solution',
        'technology_tags',
        'image_path',
        'gallery',
        'testimonials',
        'stats',
        'color',
        'icon',
        'is_featured',
    ];

    protected $casts = [
        'technology_tags' => 'array',
        'stats' => 'array',
        'gallery' => 'array',
        'testimonials' => 'array',
        'is_featured' => 'boolean',
    ];

    /**
     * Technology tags stored as JSON (no pivot table needed).
     * Access via $project->technology_tags
     */

    public function getPlainChallengeAttribute()
    {
        return strip_tags(html_entity_decode($this->challenge));
    }

    public function getPlainSolutionAttribute()
    {
        return strip_tags(html_entity_decode($this->solution));
    }
}
