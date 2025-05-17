<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens; // * added HasApiTokens trait for issuing tokens

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // many to many relationship
    // user belongs to many roles
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)
            ->withPivot('is_active') // includes the column is_active
            ->withTimestamps(); // adds timestamps on create
    }

    public function parentGuardian(): HasOne
    {
        return $this->hasOne(ParentGuardian::class);
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    // activate a role
    public function activateRole(int $roleId)
    {
        foreach ($this->roles as $role) {
            $this->roles()->updateExistingPivot($role->id, [
                'is_active' => $role->id == $roleId
            ]);
            $this->save();
        }
    }

    // deactivate active role
    public function deactivateRole()
    {
        foreach ($this->roles as $role) {
            if ($role->pivot->is_active) {
                $this->roles()->updateExistingPivot($role->id, [
                    'is_active' => false,
                ]);
                $this->save();
            }
        }
    }
}
