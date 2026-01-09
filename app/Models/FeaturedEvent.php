<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'start_time',
        'speakers_count',
        'sessions_count',
        'attendees_count',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'start_time' => 'string', // treat DB time as string
    ];
}
