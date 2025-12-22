<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Workshop extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'instructor',
        'date',
        'duration',
        'level',
        'image',
        'video',
        'description',
        'short_description',
        'objectives',
        'prerequisites',
        'attendees',
        'rating',
        'price',
        'currency',
        'registration_open',
        'seats_available',
        'status',
        'is_featured',
        'location',
        'mode',
        'language',
    ];

    protected $casts = [
        'date' => 'date',
        'rating' => 'decimal:1',
        'price' => 'decimal:2',
        'attendees' => 'integer',
        'seats_available' => 'integer',
        'registration_open' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workshop) {
            if (empty($workshop->slug)) {
                $workshop->slug = Str::slug($workshop->title);
            }
        });
    }

    // Accessors
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->date)->format('M d, Y');
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->price == 0) {
            return 'Free';
        }
        return $this->currency . ' ' . number_format($this->price, 2);
    }

    public function getIsUpcomingAttribute()
    {
        return Carbon::parse($this->date)->isFuture();
    }

    public function getIsPastAttribute()
    {
        return Carbon::parse($this->date)->isPast();
    }

    public function getRegistrationStatusAttribute()
    {
        if (!$this->registration_open) {
            return 'closed';
        }
        
        if ($this->seats_available !== null && $this->seats_available <= 0) {
            return 'full';
        }
        
        if ($this->is_past) {
            return 'completed';
        }
        
        return 'open';
    }

    // Category colors matching your view
    public function getCategoryColorAttribute()
    {
        $colors = [
            'technology' => ['text' => 'text-blue-600', 'bg' => 'bg-blue-50'],
            'buddhist' => ['text' => 'text-orange-600', 'bg' => 'bg-orange-50'],
            'education' => ['text' => 'text-green-600', 'bg' => 'bg-green-50'],
            'research' => ['text' => 'text-red-600', 'bg' => 'bg-red-50'],
            'creative' => ['text' => 'text-purple-600', 'bg' => 'bg-purple-50'],
            'wellness' => ['text' => 'text-pink-600', 'bg' => 'bg-pink-50'],
        ];
        
        return $colors[$this->category] ?? ['text' => 'text-gray-600', 'bg' => 'bg-gray-50'];
    }

    // Level badges
    public function getLevelBadgeClassAttribute()
    {
        $levels = [
            'beginner' => 'from-green-500 to-emerald-500',
            'intermediate' => 'from-blue-500 to-cyan-500',
            'advanced' => 'from-purple-500 to-pink-500',
            'all' => 'from-gray-500 to-gray-700',
        ];
        
        return $levels[strtolower($this->level)] ?? 'from-gray-500 to-gray-700';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now())
                    ->where('registration_open', true)
                    ->where('status', 'active');
    }

    public function scopePast($query)
    {
        return $query->where('date', '<', now())
                    ->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                    ->where('status', 'active');
    }

    public function scopeByCategory($query, $category)
    {
        if ($category === 'all') {
            return $query;
        }
        
        return $query->where('category', $category);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('instructor', 'like', "%{$search}%");
        });
    }

    // Relationships (if you add registration functionality later)

}