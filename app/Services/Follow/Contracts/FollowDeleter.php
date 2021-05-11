<?php

namespace App\Services\Follow\Contracts;

use App\Models\User;

interface FollowDeleter
{
    public function delete(User $loggedUser, User $following): void;

}