<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturningLearner extends Model
{
    /** @use HasFactory<\Database\Factories\ReturningLearnerFactory> */
    use HasFactory;

    protected $fillable = [
        'last_grade_level_completed',
        'last_school_attended',
        'last_school_year_completed',
        'school_id',
    ];

    public function learnerPersonalInfo(): BelongsTo
    {
        return $this->belongsTo(LearnerPersonalInfo::class);
    }
}
