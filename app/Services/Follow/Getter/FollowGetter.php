<?php

declare(strict_types=1);

namespace App\Services\Follow\Getter;

use Illuminate\Pagination\LengthAwarePaginator;
use Rennokki\Befriended\Contracts\Followable;
use Rennokki\Befriended\Contracts\Follower;

class FollowGetter implements FollowGetterInterface
{
    public function getPaginatedFollowings(Follower $follower, ?string $perPage): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $followings */
        $followings =  $follower->following()->paginate($perPage);

        return $followings->withQueryString();
    }

    public function getPaginatedFollowers(Followable $followable, ?string $perPage): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $followings */
        $followings =  $followable->followers()->paginate($perPage);

        return $followings->withQueryString();
    }
}
