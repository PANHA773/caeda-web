<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'duration',
        'level',
        'students',
        'rating',
        'image',
        'category',
        'mode',
        'tuition',
        'discount',
        'badge',
        'badge_color',
        'is_featured',
        'is_active',
        'sort_order',
        'metadata',
        'start_date',
        'application_deadline',
    ];

    protected $casts = [
        'rating' => 'decimal:2',
        'tuition' => 'decimal:2',
        'discount' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'start_date' => 'date',
        'application_deadline' => 'date',
        'metadata' => 'array',
    ];

    protected $appends = ['final_price', 'has_discount', 'discount_percentage'];

    // Accessor for final price
    protected function finalPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->discount ?? $this->tuition
        );
    }

    // Accessor to return a full image URL for templates
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image ? (
                Str::startsWith($this->image, ['http://', 'https://']) ? $this->image : '/storage/' . $this->image
            ) : '/images/placeholder-program.png'
        );
    }

    // Accessor for discount check
    protected function hasDiscount(): Attribute
    {
        return Attribute::make(
            get: fn() => !is_null($this->discount) && $this->discount < $this->tuition
        );
    }

    // Accessor for discount percentage
    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->has_discount && $this->tuition > 0) {
                    return round((($this->tuition - $this->discount) / $this->tuition) * 100);
                }
                return 0;
            }
        );
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeWithDiscount($query)
    {
        return $query->whereNotNull('discount');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now())
            ->orWhereNull('start_date');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    public function scopeByMode($query, $mode)
    {
        return $query->where('mode', $mode);
    }

    // Check if registration is open
    public function isRegistrationOpen()
    {
        if (is_null($this->application_deadline)) {
            return true;
        }
        return now()->lte($this->application_deadline);
    }

    // Check if program has started
    public function hasStarted()
    {
        if (is_null($this->start_date)) {
            return false;
        }
        return now()->gte($this->start_date);
    }

    // Get program status
    public function getStatusAttribute()
    {
        if (!$this->is_active) {
            return 'inactive';
        }

        if ($this->hasStarted()) {
            return 'ongoing';
        }

        if (!$this->isRegistrationOpen()) {
            return 'registration_closed';
        }

        return 'upcoming';
    }
}