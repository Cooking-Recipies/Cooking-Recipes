<?php

namespace App\Services\Follow;

use App\Exceptions\ResourceException;
use App\Models\User;
use App\Services\Follow\Contracts\FollowCreator;

class ModelFollowCreator implements FollowCreator
{
    public function create(User $loggedUser, User $following): void
    {
        $result = $loggedUser->follow($following);

        if ($result === false) {
            throw new ResourceException(__("resources.exists"));
        }
    }

}