<?php

namespace App\Http\Resources\Rate;

use App\Http\Resources\LikeablePaginatedCollection;
use App\Http\Resources\Rate\Res\RateResource;
use Illuminate\Support\Collection;

class RateCollection extends LikeablePaginatedCollection
{

    public function toArray($request): array
    {
        $collection = new Collection($request);
        foreach ($this->collection as $element) {
            $collection->add(new RateResource($element,$this->loggedUser));
        }

        return [
            "data" => $collection,
        ];
    }
}