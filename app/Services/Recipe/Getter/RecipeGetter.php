<?php

namespace App\Services\Recipe\Getter;

use App\Models\Recipe;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RecipeGetter implements RecipeGetterInterface
{

    public function getPaginated(
        ?string $title,  ?string $category, ?string $tag, ?string $component, ?string $perPage): LengthAwarePaginator
    {
        $recipesBuilder =  Recipe::query()->where("title", "like", "%{$title}%");

        if ($tag !== null){
            $recipesBuilder = $recipesBuilder->byTag($tag);
        }
        if ($component !== null){
            $recipesBuilder = $recipesBuilder->byComponent($component);
        }
        if ($category !== null){
            $recipesBuilder = $recipesBuilder->byCategory($category);
        }

          return $recipesBuilder->paginate($perPage);
    }
}