<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use Illuminate\Pagination\Paginator;

interface PhotoGetterInterface
{
    public function getUserPhotos(User $user, ?string $perPage): Paginator;

}