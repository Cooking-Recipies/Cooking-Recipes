<?php

namespace App\Http\Resources\Recipe\ShortVersion\Res;

use App\Http\Resources\PaginatedCollection;
use App\Http\Resources\Recipe\ShortVersion\ShortRecipeResource;

class ShortRecipeCollection extends PaginatedCollection
{
    public function toArray($request): array
    {
        return [
            "data" => ShortRecipeResource::collection($this->collection),
        ];
    }
}