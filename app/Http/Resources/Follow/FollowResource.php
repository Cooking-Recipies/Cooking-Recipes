<?php

namespace App\Http\Resources\Follow;

use App\Http\Resources\Photo\PhotoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "profile_id" => $this->id,
            "name" => $this->profile->name,
            "photo" => $this->when($this->photo !== null, new PhotoResource($this->photo), null),
        ];
    }
}