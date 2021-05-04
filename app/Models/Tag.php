<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends ModelWithoutTimestamps
{
    protected $table = "tags";
    protected $fillable = [
        "name",
    ];

    public function tagsOnRecipes(): HasMany
    {
        return $this->hasMany(TagOnRecipe::class);
    }
}