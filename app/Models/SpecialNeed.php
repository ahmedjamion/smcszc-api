<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpecialNeed extends Model
{
    /** @use HasFactory<\Database\Factories\SpecialNeedFactory> */
    use HasFactory;

    protected $fillable = [
        'is_under_special_needs_program',
        'with_diagnosis',
        'with_manifestations',
        'with_chronic_disease',
        'with_visual_impairment',
        'has_pwd_id',
    ];

    public function learnerPersonalInfo(): BelongsTo
    {
        return $this->belongsTo(LearnerPersonalInfo::class);
    }
}
