<?php

namespace App\Services\Follow\Deleter;

use App\Models\User;

interface FollowDeleterInterface
{
    public function delete(User $loggedUser, User $following): void;

}