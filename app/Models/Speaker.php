<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'image',
        'topic',
        'social',
        'is_active',
    ];

    protected $casts = [
        'social' => 'array', // automatically cast JSON to array
        'is_active' => 'boolean',
    ];

    /**
     * Get the full URL for the speaker image.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image ? (
                Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : '/storage/' . $this->image
            ) : '/images/placeholder-speaker.png'
        );
    }
}
