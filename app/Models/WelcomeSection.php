<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        'badges' => 'array',   // floating badges
        'stats' => 'array',   // statistics
        'is_active' => 'boolean',
    ];

    /**
     * Scope: only active section
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the Welcome Section image URL.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image ? (
                Str::startsWith($this->image, ['http://', 'https://'])
                ? $this->image
                : Storage::disk('public')->url($this->image)
            ) : asset('images/placeholder-welcome.png')
        );
    }
}
