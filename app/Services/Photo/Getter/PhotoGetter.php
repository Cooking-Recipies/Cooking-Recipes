<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhotoGetter implements PhotoGetterInterface
{
    public function getPaginated(User $user, ?string $perPage): LengthAwarePaginator
    {
        return $user->photos()->paginate($perPage);
    }
}