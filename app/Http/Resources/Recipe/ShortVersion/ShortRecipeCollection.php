<?php

namespace App\Http\Resources\Recipe\Liked;

use App\Http\Resources\PaginatedCollection;

class ShortRecipeCollection extends PaginatedCollection
{
    public function toArray($request): array
    {
        return [
            "data" => ShortRecipeResource::collection($this->collection),
        ];
    }
}