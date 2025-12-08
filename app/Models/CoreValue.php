<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;

    // Table name (optional, Laravel will automatically use 'core_values')
    protected $table = 'core_values';

    // Allow mass assignment
    protected $fillable = [
        'title',
        'description',
        'icon',
        'color',
        'order',
        'is_active',
    ];
}
