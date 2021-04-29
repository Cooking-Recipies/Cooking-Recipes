<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhotoOnRecipe extends Model
{
    protected $table = "photos_on_recipes";

    protected $fillable = [
        "photo_id",
        "recipe_id",
    ];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}