<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
