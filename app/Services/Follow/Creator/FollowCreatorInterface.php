<?php

namespace App\Services\Follow\Creator;

use App\Models\User;

interface FollowCreatorInterface
{
    public function create(User $follower, User $userToFollow): void;

}