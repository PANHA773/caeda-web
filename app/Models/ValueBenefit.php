<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sort_order',
        'is_active',
    ];
}
