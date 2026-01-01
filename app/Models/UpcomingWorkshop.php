<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingWorkshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'instructor',
        'image',
        'instructor_image',
        'status', // optional if you want to track active/inactive
    ];

    // Cast date to Carbon automatically
    protected $casts = [
        'date' => 'date',
        'status' => 'boolean',
    ];
}
