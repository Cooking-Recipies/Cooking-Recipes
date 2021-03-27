<?php

namespace App\Http\Resources\Photo;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "photo_id" => $this->id,
            "url" => asset($this->path),
        ];
    }
}