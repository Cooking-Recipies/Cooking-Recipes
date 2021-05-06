<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rennokki\Befriended\Contracts\Likeable;
use Rennokki\Befriended\Traits\CanBeLiked;

class Recipe extends Model implements UserResource, Likeable
{
    use HasFactory;
    use CanBeLiked;

    protected $table = "recipes";

    protected $fillable = [
        "user_id",
        "title",
        "number_of_people",
        "preparing_time",
        "category_id",
        "instruction",
    ];

    public function scopeByTag(Builder $query, string $name): Builder
    {
        return $query->whereHas("tagOnRecipe", function (Builder $query) use ($name): void {
            $query->whereHas("tag", function (Builder $query) use ($name): void {
                $query->where("name","like","%{$name}%");
            });
        });
    }

    public function scopeByComponent(Builder $query, string $name): Builder
    {
        return $query->whereHas("componentOnRecipe", function (Builder $query) use ($name): void {
            $query->whereHas("component", function (Builder $query) use ($name): void {
                $query->where("name","like","%{$name}%");
            });
        });
    }

    public function scopeByCategory(Builder $query, string $name): Builder
    {
        return $query->whereHas("category", function (Builder $query) use ($name): void {
            $query->where("name","like","%{$name}%");
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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