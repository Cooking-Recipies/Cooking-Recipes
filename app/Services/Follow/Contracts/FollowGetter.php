<?php

declare(strict_types=1);

namespace App\Services\Follow\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FollowGetter
{
    public function getPaginatedFollowers(User $followable, ?string $perPage): LengthAwarePaginator;
    public function getPaginatedFollowings(User $follower, ?string $perPage): LengthAwarePaginator;
}
