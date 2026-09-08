<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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
        static::saved(fn () => Cache::forget('site_settings'));
        static::deleted(fn () => Cache::forget('site_settings'));
    }

    /**
     * Get a setting value by key, or return the default.
     * If called with an array or null, delegates to Eloquent's query get().
     */
    public static function get(mixed $key = null, mixed $default = null): mixed
    {
        if (is_null($key)) {
            return static::query()->get();
        }

        if (is_array($key)) {
            return static::query()->get($key);
        }

        $cached = Cache::get('site_settings');
        if ($cached instanceof \Illuminate\Support\Collection && $cached->has($key)) {
            return $cached->get($key) ?? $default;
        }

        if (is_array($cached) && array_key_exists($key, $cached)) {
            return $cached[$key] ?? $default;
        }

        $setting = static::where('key', $key)->first();

        return $setting ? ($setting->value ?? $default) : $default;
    }
}
