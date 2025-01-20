<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last_name',
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

    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: static fn(string $value) => ucfirst($value),
            set: static fn(string $value) => mb_convert_case($value,MB_CASE_TITLE,'UTF-8')
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: static fn(string $value) => ucfirst($value),
            set: static fn(string $value) => mb_convert_case($value,MB_CASE_TITLE,'UTF-8')
        );
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            get: static fn(string $value) => strtolower($value),
            set: static fn(string $value) => strtolower($value)

        );
    }

    protected function password ():Attribute
    {
        return Attribute::make(
            //проще юзать в casts,  мутатор 'hashed'
            set: fn(string $value)=> Hash::make($value)
        );
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
              $name=ucfirst($attributes['name']);
              $lastName=ucfirst($attributes['last_name']);
              return "{$name} {$lastName}";
            },
            set: function (mixed $value, array $attributes) {
              $name=ucfirst($attributes['name']);
              $lastName=ucfirst($attributes['last_name']);
              return "{$name} {$lastName}";
            }
        );
    }

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
}
