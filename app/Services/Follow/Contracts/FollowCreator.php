<?php

namespace App\Services\Follow\Contracts;

use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Contracts\Follower;

interface FollowCreator
{
    public function create(Follower $follower, Model $userToFollow): void;
}