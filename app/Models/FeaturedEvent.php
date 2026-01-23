<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class FeaturedEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'start_time',
        'speakers_count',
        'sessions_count',
        'attendees_count',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'start_time' => 'string', // treat DB time as string
    ];

    /**
     * Get the full URL for the featured event image.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image ? (
                Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : asset('storage/' . $this->image)
            ) : asset('images/placeholder-featured-event.png')
        );
    }
}
