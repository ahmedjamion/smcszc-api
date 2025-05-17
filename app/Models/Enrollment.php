<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;

    public function learner(): HasOne
    {
        return $this->hasOne(Learner::class);
    }

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function gradeLevel(): HasOne
    {
        return $this->hasOne(GradeLevel::class);
    }

    public function healthNutrition(): BelongsTo
    {
        return $this->belongsTo(HealthNutrition::class);
    }

    public function enrollmentStatus(): BelongsTo
    {
        return $this->belongsTo(EnrollmentStatus::class);
    }

    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
