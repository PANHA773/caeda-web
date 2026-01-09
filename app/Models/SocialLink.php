<?php

// app/Models/SocialLink.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'icon',
        'color',
        'url',
        'sort_order',
        'is_active',
    ];
}
