<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoOnRecipeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "photo_id" => $this->photo->id,
            "url" => asset($this->photo->path),
        ];    }
}