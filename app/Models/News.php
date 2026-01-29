<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'user',
        'likes',
        'comments',
        'shares',
        'is_liked',
        'tags',
        'published_at',
    ];

    protected $casts = [
        'user' => 'array',
        'tags' => 'array',
        'is_liked' => 'boolean',
        'published_at' => 'datetime',
        'likes' => 'integer',
        'comments' => 'integer',
        'shares' => 'integer',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    /**
     * Avoid collision with the `comments` integer column (comments count).
     * Provide relationship under `commentsList` to fetch Comment models.
     */
    public function commentsList()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    /**
     * Get the full URL for the news image.
     */
    protected function imageUrl(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn() => $this->image ? (
                \Illuminate\Support\Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : '/storage/' . $this->image
            ) : '/images/placeholder-news.png'
        );
    }
}
