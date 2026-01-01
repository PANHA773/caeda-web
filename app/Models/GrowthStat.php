<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrowthStat extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'value', 'trend', 'icon', 'order'];
}
