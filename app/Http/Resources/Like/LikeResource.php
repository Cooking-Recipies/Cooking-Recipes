<?php

namespace App\Http\Resources\Like;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "user_profile_id" => $this->user->id,
            "recipe_id" => $this->id,
            "title" => $this->title,
            "category" => $this->category->name,
        ];
    }
}