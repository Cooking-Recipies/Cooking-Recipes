<?php

namespace App\Policies;

use App\Models\ApiResource;
use App\Models\User;

class ApiResourcePolicy
{
    public function haveAccess(User $user, ApiResource $photo): bool
    {
        return $photo->user()->is($user);
    }
}