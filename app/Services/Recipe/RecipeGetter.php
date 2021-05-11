<?php

namespace App\Services\Recipe\Getter;

use App\Models\Recipe;
use App\Models\User;
use App\Services\Recipe\Contracts\RecipeGetter as Getter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class RecipeGetter implements Getter
{

    public function getPaginatedBySearchOptions(
        ?string $title,  ?string $category, ?string $tag, ?string $component, ?string $perPage): LengthAwarePaginator
    {
        $builder =  Recipe::query()->where("title", "like", "%{$title}%");
        $builder = $this->filterRecipes($builder, $category, $tag, $component);

          return $builder->paginate($perPage);
    }

    public function getPaginatedByUser(User $user, ?string $perPage): LengthAwarePaginator
    {
        return $user->recipes()->paginate($perPage);
    }

    private function filterRecipes(Builder $builder, ?string $category, ?string $tag, ?string  $component): Builder
    {
        if ($tag !== null){
            $builder = $builder->byTag($tag);
        }
        if ($component !== null){
            $builder = $builder->byComponent($component);
        }
        if ($category !== null){
            $builder = $builder->byCategory($category);
        }

        return $builder;
    }
}