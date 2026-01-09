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
}
