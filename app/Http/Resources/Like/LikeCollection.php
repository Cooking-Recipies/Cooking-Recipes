<?php

namespace App\Http\Resources\Like;

use App\Http\Resources\PaginatedCollection;

class LikeCollection extends PaginatedCollection
{
    public function toArray($request): array
    {
        return [
            "data" => LikeResource::collection($this->collection),
        ];
    }
}