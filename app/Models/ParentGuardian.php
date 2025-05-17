<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ParentGuardian extends Model
{
    /** @use HasFactory<\Database\Factories\ParentGuardianFactory> */
    use HasFactory;

    public function parentGuardianPersonalInfo(): HasOne
    {
        return $this->hasOne(ParentGuardianPersonalInfo::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
