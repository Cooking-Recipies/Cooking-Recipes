<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotoGetter implements PhotoGetterInterface
{
    public function getUserPhotos(User $user, ?string $perPage): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $photos */
        $photos = $user->photos()->paginate($perPage);

        return $photos->withQueryString();
    }
}