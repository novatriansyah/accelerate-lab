<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'short_description',
        'content',
        'sort_order',
        'features',
        'technologies',
        'features',
        'technologies',
        'process',
        'cta_text',
        'category',
        'headline',
        'benefits',
        'hero_image',
        'has_custom_page',
    ];

    protected $casts = [
        'features' => 'array',
        'technologies' => 'array',
        'process' => 'array',
        'process' => 'array',
        'benefits' => 'array',
        'has_custom_page' => 'boolean',
    ];
}
