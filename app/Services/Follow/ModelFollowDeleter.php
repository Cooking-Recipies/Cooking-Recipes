<?php

namespace App\Services\Follow;

use App\Exceptions\ResourceException;
use App\Models\User;
use App\Services\Follow\Contracts\FollowDeleter;

class ModelFollowDeleter implements FollowDeleter
{
    public function delete(User $loggedUser, User $following): void
    {
        $result = $loggedUser->unfollow($following);

        if ($result === false) {
            throw new ResourceException(__("resources.not_exist"));
        }
    }
}