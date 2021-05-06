<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rennokki\Befriended\Contracts\Following;
use Rennokki\Befriended\Contracts\Liker;
use Rennokki\Befriended\Traits\CanLike;
use Rennokki\Befriended\Traits\Follow;


class User extends Authenticatable implements Following, Liker
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use Follow;
    use CanLike;

    protected $fillable = [
        "name",
        "email",
        "password",
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];

    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
