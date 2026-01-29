<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfficeManager extends Model
{
    protected $fillable = [
        'name',
        'position',
        'image',
        'gradient',
        'order',
    ];

    protected $appends = [
        'image_url',
    ];

    /**
     * Get full URL for the office manager image.
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }

        // Absolute URL (external image)
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        // Public assets (legacy support)
        if (Str::startsWith($this->image, ['assets/', '/assets/'])) {
            return '/' . ltrim($this->image, '/');
        }

        // Storage image
        return '/storage/' . ltrim($this->image, '/');
    }


}
