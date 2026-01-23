<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',
        'time',
        'location',
        'type',
        'seats',
        'speakers',
        'image',
        'tag',
        'is_featured'
    ];

    protected $casts = [
        'date' => 'date',
        'is_featured' => 'boolean',
        'seats' => 'integer',
        'speakers' => 'integer',
    ];

    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', now()->toDateString())->orderBy('date');
    }

    /**
     * Get the full URL for the event image.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image ? (
                Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : asset('storage/' . $this->image)
            ) : asset('images/placeholder-event.png')
        );
    }
}
