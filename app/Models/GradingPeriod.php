<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradingPeriod extends Model
{
    /** @use HasFactory<\Database\Factories\GradingPeriodFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
    ];

    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
