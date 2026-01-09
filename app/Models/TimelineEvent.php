<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'description',
        'status',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
         'date' => 'date',  
        'is_active' => 'boolean',
    ];
}
