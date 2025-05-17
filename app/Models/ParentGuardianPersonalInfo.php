<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParentGuardianPersonalInfo extends Model
{
    /** @use HasFactory<\Database\Factories\ParentGuardianPersonalInfoFactory> */
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'contact_number',
    ];

    public function learnerPersonalInfo(): BelongsTo
    {
        return $this->belongsTo(LearnerPersonalInfo::class);
    }

    public function parentGuardian(): BelongsTo
    {
        return $this->belongsTo(ParentGuardian::class);
    }
}
