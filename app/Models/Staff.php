<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Staff extends Model
{
    // Table name (optional if it follows Laravel conventions)
    protected $table = 'staff';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'position',
        'image',
        'order',
        'is_active',
    ];

    // Casts
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Append derived attributes
    protected $appends = [
        'image_url',
    ];

    // Default ordering by 'order' column
    protected $attributes = [
        'order' => 0,
        'is_active' => true,
    ];

    /**
     * Scope for active staff members
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Return a full URL for the staff image.
     * - If the stored value is an absolute URL, return as-is.
     * - If it's a relative storage path, prefix with `storage` asset URL.
     * - If no image, return null (view can show initials or placeholder).
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        // Handle legacy public asset paths used in seeders (e.g. '/assets/...')
        if (Str::startsWith($this->image, ['/assets', 'assets/'])) {
            return asset(ltrim($this->image, '/'));
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }
}
