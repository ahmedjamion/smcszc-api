<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreferredLearningModality extends Model
{
    /** @use HasFactory<\Database\Factories\PreferredLearningModalityFactory> */
    use HasFactory;

    protected $fillable = [
        'learning_modality',
    ];

    public function learnerPersonalInfos()
    {
        return $this->belongsToMany(LearnerPersonalInfo::class, 'learner_personal_info_preferred_learning_modality')
            ->withTimestamps();
    }
}
