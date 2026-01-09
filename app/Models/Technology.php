<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'category',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technology');
    }
}
