<?php

namespace App\Http\Resources\Profile;

use App\Http\Resources\PaginatedCollection;

class ProfileCollection extends PaginatedCollection
{
    public function toArray($request)
    {
        return [
            "data" => ProfileResource::collection($this->collection),
            "pagination" => $this->getPaginationLinks($request),
        ];
    }
}