<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'monthly_price',
        'annual_price',
        'badge',
        'color',
        'gradient',
        'members_count',
        'is_popular',
        'is_active',
    ];

    public function features()
    {
        return $this->hasMany(PricingFeature::class);
    }
}
