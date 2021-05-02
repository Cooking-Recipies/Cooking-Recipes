<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model implements ApiResource
{
    protected $table = "recipes";

    protected $fillable = [
        "user_id",
        "title",
        "number_of_people",
        "preparing_time",
        "category_id",
        "instruction",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    public function componentOnRecipe(): HasMany
    {
        return $this->hasMany(ComponentOnRecipe::class);
    }

    public function photoOnRecipe(): HasMany
    {
        return $this->hasMany(PhotoOnRecipe::class);
    }

    public function tagOnRecipe(): HasMany
    {
        return $this->hasMany(TagOnRecipe::class);
    }
}