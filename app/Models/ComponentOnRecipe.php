<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComponentOnRecipe extends Model
{
    protected $table = "components_on_recipes";

    protected $fillable = [
        "component_id",
        "recipe_id",
    ];

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}