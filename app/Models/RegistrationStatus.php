<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrationStatus extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationStatusFactory> */
    use HasFactory;

    public function registration(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}
