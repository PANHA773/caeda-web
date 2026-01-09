<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends Model
{
    use HasFactory;

    protected $table = 'welcome_sections';

    protected $fillable = [
        'title',
        'description',
        'signature_name',
        'signature_title',
        'image',
        'badges',
        'stats',
        'is_active',
    ];

    protected $casts = [
        'description' => 'array',   // paragraphs
        'badges'      => 'array',   // floating badges
        'stats'       => 'array',   // statistics
        'is_active'   => 'boolean',
    ];

    /**
     * Scope: only active section
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
