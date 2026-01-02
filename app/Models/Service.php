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
    ];

    protected $casts = [
        'features' => 'array',
        'technologies' => 'array',
        'process' => 'array',
        'benefits' => 'array',
    ];
}
