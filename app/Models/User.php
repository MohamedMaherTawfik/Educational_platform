<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function courses()
    {
        return $this->hasMany(Courses::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function quizes()
    {
        return $this->hasMany(quizes::class);
    }

    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function certificates()
    {
        return $this->hasMany(certificate::class);
    }

    public function assignmentsSubmissions()
    {
        return $this->hasMany(assignment_submission::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }

}
