<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TagOnRecipe extends ModelWithoutTimestamps
{
    protected $table = "tags_on_recipes";
    protected $fillable = [
        "tag_id",
        "recipe_id",
    ];

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}