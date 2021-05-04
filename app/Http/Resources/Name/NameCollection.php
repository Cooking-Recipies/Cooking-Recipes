<?php

namespace App\Http\Resources\Name;

use App\Http\Resources\PaginatedCollection;

class NameCollection extends PaginatedCollection
{
    public function toArray($request): array
    {
        return [
            "data" => NameResource::collection($this->collection),
        ];
    }
}