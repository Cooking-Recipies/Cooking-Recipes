<?php

namespace App\Http\Resources\Recipe;

use App\Http\Resources\PaginatedCollection;

class RecipeCollection extends PaginatedCollection
{
    public function toArray($request): array
    {
        return [
            "data" => RecipeResource::collection($this->collection),
        ];
    }
}