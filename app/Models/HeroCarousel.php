<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class HeroCarousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'order',
        'is_active',
    ];

    /**
     * Get the hero slide image URL.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image
            ? '/storage/' . $this->image
            : '/images/placeholder-hero.png'
        );
    }
}
