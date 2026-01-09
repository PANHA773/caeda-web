<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'image',
        'gradient',
        'order',
    ];
}
