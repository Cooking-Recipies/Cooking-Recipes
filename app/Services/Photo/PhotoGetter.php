<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use App\Services\Photo\Contracts\PhotoGetter as Getter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhotoGetter implements Getter
{
    public function getPaginated(User $user, ?string $perPage): LengthAwarePaginator
    {
        return $user->photos()->paginate($perPage);
    }
}