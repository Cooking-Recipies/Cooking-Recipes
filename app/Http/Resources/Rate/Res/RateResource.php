<?php

namespace App\Http\Resources\Rate\Res;

use App\Http\Resources\LikeableResource;

class RateResource extends LikeableResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "rate" => $this->rate,
            "comment" => $this->comment,
            "edited" => $this->created_at->toDateTimeString() !== $this->updated_at->toDateTimeString(),
            "crated_by_logged_user" => $this->user->is($this->loggedUser),
            "likes" => $this->with($request),
        ];
    }
}