<?php

namespace App\Http\Resources\Photo;

use App\Http\Resources\PaginatedCollection;

class PhotoCollection extends PaginatedCollection
{
    public function toArray($request)
    {
        return [
            "data" => PhotoResource::collection($this->collection),
            "pagination" => $this->getPaginationLinks($request),
        ];
    }
}