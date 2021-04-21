<?php

declare(strict_types=1);

namespace App\Services\Follow\Getter;

use App\Models\User;
use Illuminate\Support\Collection;

class FollowGetter implements FollowGetterInterface
{
    public function getFollowings(User $user): Collection
    {
        return $user->followers()->get();
    }

    public function getFollowers(User $user): Collection
    {
        return $user->following()->get();
    }
}
