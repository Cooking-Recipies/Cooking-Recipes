<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rennokki\Befriended\Contracts\Likeable;
use Rennokki\Befriended\Traits\CanBeLiked;

class Rate extends Model implements UserResource, Likeable
{
    use CanBeLiked;

    protected $table = "rates";

    protected $fillable = [
        "user_id",
        "recipe_id",
        "rate",
        "comment",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}