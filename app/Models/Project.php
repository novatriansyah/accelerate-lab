<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'client',
        'description',
        'challenge',
        'solution',
        'technology_tags',
        'image_path',
        'stats',
        'color',
        'icon',
    ];

    protected $casts = [
        'technology_tags' => 'array',
        'stats' => 'array',
    ];
}
