<?php

namespace App\Http\Resources\Recipe\Properties;

use Illuminate\Http\Resources\Json\JsonResource;

class TagOnRecipeResource extends JsonResource
{
    public function toArray($request): string
    {
        return $this->tag->name;
    }
}