<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Learner extends Model
{
    /** @use HasFactory<\Database\Factories\LearnerFactory> */
    use HasFactory;

    protected $fillable = [
        'learner_reference_number',
    ];

    public function learnerPersonalInfo(): HasOne
    {
        return $this->hasOne(LearnerPersonalInfo::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
