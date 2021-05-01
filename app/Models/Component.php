<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Component extends ModelWithoutTimestamps
{
    protected $table = "components";
    protected $fillable = [
        "name",
    ];

    public function componentsOnRecipes(): HasMany
    {
        return $this->hasMany(ComponentOnRecipe::class);
    }
}