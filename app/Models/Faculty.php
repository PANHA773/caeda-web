<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';

    protected $fillable = [
        'name',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
