<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaderTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'image',
        'gradient',
        'order',       // ✅ REQUIRED
        'is_active',
    ];

    /**
     * Cast attributes
     */
    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];
}
