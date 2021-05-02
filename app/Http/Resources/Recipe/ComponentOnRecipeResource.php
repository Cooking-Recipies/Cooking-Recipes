<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Resources\Json\JsonResource;

class ComponentOnRecipeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "name" => $this->component->name,
            "quantity" => $this->quantity,
        ];
    }
}