<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SuccessStory extends Model
{
  protected $fillable = [
    'name',
    'role',
    'achievement',
    'image',
    'quote',
    'year',
    'is_active',
    'order',
  ];

  /**
   * Accessor for full image URL.
   */
  protected function imageUrl(): Attribute
  {
    return Attribute::make(
      get: fn() => $this->image ? (
        Str::startsWith($this->image, ['http://', 'https://'])
        ? $this->image
        : '/storage/' . $this->image
      ) : '/images/placeholder-alumni.png'
    );
  }
}
