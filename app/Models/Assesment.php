<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assesment extends Model
{
    /** @use HasFactory<\Database\Factories\AssesmentFactory> */
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'title',
        'type',
        'description',
        'total_score',
        'date',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function assesmentResult(): HasMany
    {
        return $this->hasMany(AssesmentResult::class);
    }

    public function gradingPeriod(): BelongsTo
    {
        return $this->belongsTo(GradingPeriod::class);
    }
}
