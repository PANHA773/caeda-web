<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalCta extends Model
{
     protected $fillable = [
        'stat_1_number',
        'stat_1_label',
        'stat_2_number',
        'stat_2_label',
        'stat_3_number',
        'stat_3_label',
        'title',
        'highlight_text',
        'description',
        'primary_button_text',
        'secondary_button_text',
        'is_active',
    ];
}
