<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'description',
        'tagline',
        'social_links',
        'quick_links',
        'contact_info',
    ];

    protected $casts = [
        'social_links' => 'array',
        'quick_links' => 'array',
        'contact_info' => 'array',
    ];
}
