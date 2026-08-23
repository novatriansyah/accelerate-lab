<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'is_display',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => \Illuminate\Support\Facades\Cache::forget('site_settings'));
        static::deleted(fn () => \Illuminate\Support\Facades\Cache::forget('site_settings'));
    }
}
