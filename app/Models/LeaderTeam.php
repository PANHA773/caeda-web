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
        'order' => 'integer',
    ];

    /**
     * Get the full URL for the leader image.
     */
    protected function imageUrl(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn() => $this->image ? (
                \Illuminate\Support\Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : '/storage/' . $this->image
            ) : null
        );
    }
}
