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

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }
}
