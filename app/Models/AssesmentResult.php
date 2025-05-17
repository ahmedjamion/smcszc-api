<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssesmentResult extends Model
{
    /** @use HasFactory<\Database\Factories\AssesmentResultFactory> */
    use HasFactory;

    protected $fillable = [
        'score',
        'remarks',
    ];

    public function assesment(): BelongsTo
    {
        return $this->belongsTo(Assesment::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
