<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'image',
        'topic',
        'social',
        'is_active',
    ];

    protected $casts = [
        'social' => 'array', // automatically cast JSON to array
        'is_active' => 'boolean',
    ];
}
