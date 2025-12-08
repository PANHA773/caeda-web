<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OfficeManager extends Model
{
    protected $fillable = ['name', 'position', 'image', 'gradient', 'order'];

    // Append derived attributes to the model's array / JSON form
    protected $appends = [
        'image_url',
    ];

    /**
     * Get full URL for the office manager image.
     * Returns absolute URL if stored as such, otherwise returns `asset('storage/...')`.
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        // If the seed uses legacy public assets (e.g. '/assets/...'), return that public asset path
        if (Str::startsWith($this->image, ['/assets', 'assets/'])) {
            return asset(ltrim($this->image, '/'));
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }
}
