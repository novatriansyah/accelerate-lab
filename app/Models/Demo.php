<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'client_logo',
        'thumbnail',
        'industry',
        'description',
        'html_content',
        'assets',
        'access_passcode',
        'default_device',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'assets' => 'array',
    ];


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function isPasscodeProtected(): bool
    {
        return !empty($this->access_passcode);
    }

    public function verifyPasscode(?string $passcode): bool
    {
        if (!$this->isPasscodeProtected()) {
            return true;
        }

        return !empty($passcode) && hash_equals((string) $this->access_passcode, (string) $passcode);
    }

    public function getProcessedHtmlContent(): string
    {
        $html = (string) ($this->html_content ?? '');

        $logoUrl = $this->client_logo ? asset('storage/' . $this->client_logo) : '';
        $thumbnailUrl = $this->thumbnail ? asset('storage/' . $this->thumbnail) : '';
        $clientName = $this->client_name ? e($this->client_name) : '';
        $title = $this->title ? e($this->title) : '';

        $replacements = [
            '{{CLIENT_LOGO}}' => $logoUrl,
            '{{ CLIENT_LOGO }}' => $logoUrl,
            '{{client_logo}}' => $logoUrl,
            '{{ client_logo }}' => $logoUrl,

            '{{CLIENT_THUMBNAIL}}' => $thumbnailUrl,
            '{{ CLIENT_THUMBNAIL }}' => $thumbnailUrl,
            '{{client_thumbnail}}' => $thumbnailUrl,
            '{{ client_thumbnail }}' => $thumbnailUrl,

            '{{CLIENT_NAME}}' => $clientName,
            '{{ CLIENT_NAME }}' => $clientName,
            '{{client_name}}' => $clientName,
            '{{ client_name }}' => $clientName,

            '{{TITLE}}' => $title,
            '{{ TITLE }}' => $title,
            '{{title}}' => $title,
            '{{ title }}' => $title,
        ];

        return strtr($html, $replacements);
    }
}
