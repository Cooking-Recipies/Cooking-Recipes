<?php

declare(strict_types=1);

namespace App\Services\Follow\Getter;

use App\Models\User;
use Illuminate\Support\Collection;

interface FollowGetterInterface
{
    public function getFollowers(User $user): Collection;
    public function getFollowings(User $user): Collection;
}
