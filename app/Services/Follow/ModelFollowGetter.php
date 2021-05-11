<?php

declare(strict_types=1);

namespace App\Services\Follow;

use App\Services\Follow\Contracts\FollowGetter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Rennokki\Befriended\Contracts\Followable;
use Rennokki\Befriended\Contracts\Follower;

class ModelFollowGetter implements FollowGetter
{
    public function getPaginatedFollowings(Follower $follower, ?string $perPage): LengthAwarePaginator
    {
        return $follower->following()->paginate($perPage);
    }

    public function getPaginatedFollowers(Followable $followable, ?string $perPage): LengthAwarePaginator
    {
        return  $followable->followers()->paginate($perPage);
    }
}
