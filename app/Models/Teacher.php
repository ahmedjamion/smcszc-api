<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'prc_id',
        'date_hired',
        'teacher_level',
    ];

    public function teacherPersonalInfo(): HasOne
    {
        return $this->hasOne(TeacherPersonalInfo::class);
    }

    public function section(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'adviser_section');
    }

    public function subject(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
