<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Devdojo\Auth\Models\User as AuthUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends AuthUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    /**
     * Get the folders associated with the user.
     */
    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    /**
     * Get the summaries associated with the user.
     */
    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }

    /**
     * Get the quizzes associated with the user.
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? asset('avatars/' . $this->avatar) : asset('avatars/default.png');
    }

}
