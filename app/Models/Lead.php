<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'message',
        'status',
        'source',
    ];

    protected $casts = [
        'status' => \App\Enums\LeadStatus::class,
    ];

    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }

    public function getTitleAttribute(): string
    {
        return $this->name;
    }

    public function getDescriptionAttribute(): string
    {
        return $this->company ?? 'No Company';
    }
}
