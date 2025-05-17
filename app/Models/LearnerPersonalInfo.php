<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class LearnerPersonalInfo extends Model
{
    /** @use HasFactory<\Database\Factories\LearnerPersonalInfoFactory> */
    use HasFactory;

    protected $fillable = [
        'psa_birth_certificate_no',
        'first_name',
        'last_name',
        'middel_name',
        'extension_name',
        'birth_date',
        'age',
        'sex',
        'place_of_birth',
        'religion',
        'mother_tongue',
        'is_indigenous_community_member',
        'community',
        'is_4ps_beneficiary',
        'household_no',

    ];

    public function learner(): BelongsTo
    {
        return $this->belongsTo(Learner::class);
    }

    public function currentAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', 'current');
    }

    public function permanentAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', 'permament');
    }

    public function father(): HasOne
    {
        return $this->hasOne(ParentGuardianPersonalInfo::class)->where('type', 'father');
    }

    public function mother(): HasOne
    {
        return $this->hasOne(ParentGuardianPersonalInfo::class)->where('type', 'mother');
    }

    public function guardian(): HasOne
    {
        return $this->hasOne(ParentGuardian::class)->where('type', 'guardian');
    }

    public function specialNeeds(): HasOne
    {
        return $this->hasOne(SpecialNeed::class);
    }

    public function returningLearner(): HasOne
    {
        return $this->hasOne(ReturningLearner::class);
    }

    public function preferredLearningModalities()
    {
        return $this->belongsToMany(PreferredLearningModality::class, 'learner_personal_info_preferred_learning_modality')
            ->withTimestamps();
    }
}
