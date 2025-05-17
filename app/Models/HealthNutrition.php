<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HealthNutrition extends Model
{
    /** @use HasFactory<\Database\Factories\HealthNutritionFactory> */
    use HasFactory;

    protected $fillable = [
        'weight',
        'height',
        'height_squared',
        'bmi',
        'bmi_category',
        'height_for_age',
        'remarks',
    ];

    public function enrollment(): HasOne
    {
        return $this->hasOne(Enrollment::class);
    }
}
