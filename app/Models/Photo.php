<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable = [
        "path",
        "user_id",
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($photo): void {
            $photo->{$photo->getKeyName()} = (string)Str::uuid();
        });
    }
}