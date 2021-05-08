<?php

namespace App\Http\Resources\Recipe\ShortVersion;

use App\Http\Resources\LikeablePaginatedCollection;
use App\Http\Resources\Recipe\ShortVersion\Res\ShortRecipeResource;
use Illuminate\Support\Collection;

class ShortRecipeCollection extends LikeablePaginatedCollection
{
    public function toArray($request): array
    {
        $collection = new Collection($request);
        foreach ($this->collection as $element) {
            $collection->add(new ShortRecipeResource($element,$this->loggedUser));
        }

        return [
            "data" => $collection,
        ];
    }
}