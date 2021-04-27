<?php

declare(strict_types=1);

namespace App\Services\Follow\Getter;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface FollowGetterInterface
{
    public function getPaginatedFollowers(User $followable, ?string $perPage): LengthAwarePaginator;
    public function getPaginatedFollowings(User $follower, ?string $perPage): LengthAwarePaginator;
}
