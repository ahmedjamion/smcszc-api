<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class TeacherPersonalInfo extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherPersonalInfoFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middel_name',
        'extension_name',
        'birth_date',
        'age',
        'sex',
        'place_of_birth',
        'religion',
        'civil_status',
        'contact_number',
        'educational_background',
        'years_of_experience',
        'specialization',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function currentAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', 'current');
    }

    public function permanentAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', 'permanent');
    }
}
