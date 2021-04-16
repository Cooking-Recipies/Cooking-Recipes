<?php

namespace App\Http\Resources\Profile;

use App\Http\Resources\Photo\PhotoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "photo" => $this->when($this->photo !== null, new PhotoResource($this->photo), null),
        ];
    }
}