<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuItem extends Model
{
    protected $fillable = [
        'menu_category_id',
        'title',
        'slug',
        'description',
        'price',
        'old_price',
        'image',
        'badge',
        'rating',
        'reviews',
        'is_active',
        'order'
    ];

    protected static function booted()
    {
        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    /**
     * Get the full URL for the menu item image.
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
