<?php

namespace App\Services\Recipe\Getter;

use App\Models\Recipe;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RecipeGetter implements RecipeGetterInterface
{

    public function getPaginated(?string $title, ?string $perPage): LengthAwarePaginator
    {
        return Recipe::query()
            ->where("title", "like", "%{$title}%")
            ->paginate($perPage);
    }
}