<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    protected $fillable = [
        'school_name',
        'school_id',
        'district',
        'region',
        'division',
    ];

    public function schoolYear(): HasMany
    {
        return $this->hasMany(SchoolYear::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
