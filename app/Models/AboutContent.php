<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $table = 'about_contents';

    protected $fillable = [
        'page_title',
        'page_description',
        'header_title',
        'foundation_content',
        'today_content',
        'mission',
        'vision',
        'rector_name',
        'rector_message',
        'rector_image',
        'is_active',
    ];

    protected $casts = [
        'foundation_content' => 'array',
        'today_content' => 'array',
        'is_active' => 'boolean',
    ];
}
