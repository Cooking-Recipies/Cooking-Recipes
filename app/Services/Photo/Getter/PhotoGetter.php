<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use Illuminate\Pagination\Paginator;

class PhotoGetter implements PhotoGetterInterface
{
    public function getUserPhotos(User $user, ?string $perPage): Paginator
    {
        /** @var Paginator $photos */
        $photos = $user->photos()->simplePaginate($perPage);

        return $photos->withQueryString();
    }
}