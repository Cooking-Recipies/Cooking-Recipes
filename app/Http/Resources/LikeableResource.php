<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Rennokki\Befriended\Contracts\Likeable;

abstract class LikeableResource extends JsonResource
{
    protected  ?User $loggedUser;

    public function __construct(Likeable $resource,User $loggedUser = null)
    {
        parent::__construct($resource);
        $this->loggedUser = $loggedUser;
    }

    public function with($request): array
    {
        return [
            "logged_user_liked" => $this->isResourceLikedByLoggedUser(),
            "likes_count" => $this->likers(User::class)->count(),
        ];
    }

    private function isResourceLikedByLoggedUser(): bool
    {
        return $this->loggedUser !== null ? $this->loggedUser->isLiking($this->resource) : false;
    }
}