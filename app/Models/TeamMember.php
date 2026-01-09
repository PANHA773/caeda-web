<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    use HasFactory, SoftDeletes; // SoftDeletes enabled

    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'position',
        'department',
        'photo',
        'bio',
        'social_links',
        'order',
        'is_active',
    ];

    protected $casts = [
        'social_links' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime', // cast deleted_at for soft deletes
    ];

    /**
     * Accessor: generate full photo URL automatically
     */
    public function getPhotoAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If it's already a full URL, return as-is
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        // Handle legacy public asset paths (e.g. '/assets/...')
        if (Str::startsWith($value, ['/assets', 'assets/'])) {
            return asset(ltrim($value, '/'));
        }

        // Normalize storage path: ensure we don't duplicate 'team-members/' prefix
        $path = ltrim($value, '/');
        if (!Str::startsWith($path, 'team-members/')) {
            $path = 'team-members/' . $path;
        }

        return asset('storage/' . $path);
    }
}
