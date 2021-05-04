<?php

namespace App\Policies;

use App\Models\UserResource;
use App\Models\User;

class UserResourcePolicy
{
    public function haveAccess(User $user, UserResource $apiResource): bool
    {
        return $apiResource->user()->is($user);
    }
}