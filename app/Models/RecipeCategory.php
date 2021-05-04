<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecipeCategory extends ModelWithoutTimestamps
{
    protected $table = "categories";

    protected $fillable = [
        "name",
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}