<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Workshop extends Model
{

    protected $fillable = [
        'title',
        'category',
        'instructor',
        'date',
        'duration',
        'level',
        'image',
        'video',
        'description',
        'attendees',
        'rating',
        'instructor_image',
        'order',
    ];

    /**
     * Accessor for backward-compatible `video_url` attribute used in views.
     */
    public function getVideoUrlAttribute()
    {
        return $this->normalizeVideoUrl($this->video ?? null);
    }

    /**
     * Normalize common video URLs to an embeddable URL (YouTube/Vimeo).
     */
    protected function normalizeVideoUrl(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        // Check if it's a YouTube URL (watch?v=...)
        if (preg_match('#(?:https?://)?(?:www\.)?youtube\.com/watch\?v=([A-Za-z0-9_\-]+)#i', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        // Check if it's a YouTube short URL (youtu.be/...)
        if (preg_match('#(?:https?://)?(?:www\.)?youtu\.be/([A-Za-z0-9_\-]+)#i', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        // Check if it's a Vimeo URL
        if (preg_match('#(?:https?://)?(?:www\.)?vimeo\.com/(?:channels/[A-Za-z0-9_\-]+/)?(\d+)#i', $url, $m)) {
            return 'https://player.vimeo.com/video/' . $m[1];
        }

        // If it starts with http or https but didn't match the above, it's an external link
        if (preg_match('/^https?:\/\//i', $url)) {
            return $url;
        }

        // Otherwise, assume it's a local file path in the 'public' disk
        return \Illuminate\Support\Facades\Storage::disk('public')->url($url);
    }

}