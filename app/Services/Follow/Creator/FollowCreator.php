<?php

namespace App\Services\Follow\Deleter;

use App\Exceptions\ResourceException;
use App\Models\User;
use App\Services\Follow\Creator\FollowCreatorInterface;

class FollowCreator implements FollowCreatorInterface
{
    public function create(User $loggedUser, User $following): void
    {
        $result = $loggedUser->follow($following);

        if ($result === false) {
            throw new ResourceException(__("resources.exists"));
        }
    }

}