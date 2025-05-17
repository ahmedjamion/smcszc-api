<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradeLevel extends Model
{
    /** @use HasFactory<\Database\Factories\GradeLevelFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level_order',
    ];

    public function section(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
