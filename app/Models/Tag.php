<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
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