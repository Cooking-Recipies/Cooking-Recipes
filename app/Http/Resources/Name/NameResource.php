<?php

namespace App\Http\Resources\Name;

use Illuminate\Http\Resources\Json\JsonResource;

class NameResource extends JsonResource
{
    public function toArray($request): string
    {
        return $this->name;
    }
}