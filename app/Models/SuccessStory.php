<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
      protected $fillable = [
        'name',
        'role',
        'achievement',
        'image',
        'quote',
        'year',
        'is_active',
        'order',
    ];
}
