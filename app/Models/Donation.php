<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'amount',
        'cause',
        'payment_method',
        'recurring',
    ];

    protected $casts = [
        'recurring' => 'boolean',
        'amount' => 'decimal:2',
    ];
}
