<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImpactStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'story',
        'image',
        'impact',
        'color',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the full URL for the story image.
     */
    protected function imageUrl(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn() => $this->image ? (
                \Illuminate\Support\Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : '/storage/' . $this->image
            ) : '/images/placeholder-story.png'
        );
    }
}
