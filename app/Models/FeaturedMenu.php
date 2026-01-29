<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedMenu extends Model
{
  protected $fillable = [
    'title',
    'badge',
    'image',
    'price',
    'old_price',
    'description',
    'rating',
    'reviews',
    'is_active',
    'order',
  ];

  /**
   * Get the full URL for the menu image.
   */
  protected function imageUrl(): \Illuminate\Database\Eloquent\Casts\Attribute
  {
    return \Illuminate\Database\Eloquent\Casts\Attribute::make(
      get: fn() => $this->image ? (
        \Illuminate\Support\Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : '/storage/' . $this->image
      ) : '/images/placeholder-menu.png'
    );
  }
}
