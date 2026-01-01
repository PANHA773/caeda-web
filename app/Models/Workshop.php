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

}