<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title','slug','description','date','time','location','type','seats','speakers','image','tag','is_featured'
    ];

    protected $casts = [
        'date' => 'date',
        'is_featured' => 'boolean',
        'seats' => 'integer',
        'speakers' => 'integer',
    ];

    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', now()->toDateString())->orderBy('date');
    }
}
