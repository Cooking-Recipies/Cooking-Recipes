<?php

namespace App\Http\Resources\Rate;

use App\Http\Resources\PaginatedCollection;
use App\Http\Resources\Rate\Res\RateResource;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class RateCollection extends PaginatedCollection
{
    protected ?User $loggedUser;

    public function __construct(LengthAwarePaginator $rate, User $loggedUser = null)
    {
        parent::__construct($rate);
        $this->loggedUser = $loggedUser;
    }

    public function toArray($request): array
    {
        $collection = new Collection($request);
        foreach ($this->collection as $element) {
            $collection->add(new RateResource($element,$this->loggedUser));
        }

        return [
            "data" => [$collection],
        ];
    }
}