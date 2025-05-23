<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // many to many relationship
    // roles belongs to many users
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_active'); // includes the column is_active
    }
}
