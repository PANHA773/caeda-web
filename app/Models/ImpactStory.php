<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImpactStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'story',
        'image',
        'impact',
        'color',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
