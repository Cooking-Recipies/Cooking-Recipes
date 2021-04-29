<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Component extends Model
{
    protected $table = "components";

    protected $fillable = [
        "name",
        "quantity",
    ];

    public function componentsOnRecipes(): HasMany
    {
        return $this->hasMany(ComponentOnRecipe::class);
    }
}