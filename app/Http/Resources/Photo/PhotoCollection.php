<?php

namespace App\Http\Resources\Photo;

use App\Http\Resources\PaginatedCollection;

class PhotoCollection extends PaginatedCollection
{
    public function toArray($request): array
    {
        return [
            "data" => PhotoResource::collection($this->collection),
        ];
    }
}