<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'time',
        'description',
        'is_active',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i:s', // ensures correct TIME handling
        'is_active' => 'boolean',
    ];

    /**
     * Accessor: formatted time for display (AM/PM)
     */
    public function getFormattedTimeAttribute(): ?string
    {
        if (!$this->time) {
            return null;
        }

        return Carbon::parse($this->time)->format('h:i A');
    }
}
