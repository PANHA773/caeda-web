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
        'video',
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

    /**
     * Get the Welcome Section video URL.
     */
    protected function videoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->video) {
                    return null;
                }

                // If it's a YouTube URL, convert to embed format
                if (str_contains($this->video, 'youtube.com') || str_contains($this->video, 'youtu.be')) {
                    return $this->convertToYouTubeEmbed($this->video);
                }

                // If it's a URL, return as is
                if (Str::startsWith($this->video, ['http://', 'https://'])) {
                    return $this->video;
                }

                // Otherwise, it's a file path
                return Storage::disk('public')->url($this->video);
            }
        );
    }

    /**
     * Convert YouTube URL to embed format
     */
    private function convertToYouTubeEmbed($url)
    {
        // Already in embed format
        if (str_contains($url, '/embed/')) {
            return $url;
        }

        // Extract video ID from different YouTube URL formats
        $videoId = null;

        // Format: https://www.youtube.com/watch?v=VIDEO_ID
        if (preg_match('/[?&]v=([^&]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://youtu.be/VIDEO_ID
        elseif (preg_match('/youtu\.be\/([^?]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }

        // Return embed URL if video ID found
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : $url;
    }
}
