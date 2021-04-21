<?php

namespace App\Services\Follow\Deleter;

use App\Exceptions\ResourceException;
use App\Models\User;

class FollowDeleter implements FollowDeleterInterface
{
    public function delete(User $loggedUser, User $following): void
    {
        $result = $loggedUser->unfollow($following);

        if ($result === false) {
            throw new ResourceException(__("resources.not_exist"));
        }
    }
}