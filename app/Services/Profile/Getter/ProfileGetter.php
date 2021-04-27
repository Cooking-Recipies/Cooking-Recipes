<?php

namespace App\Services\Profile\Getter;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Profile;

class ProfileGetter implements ProfileGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator
    {
        if ($name === null)
        {
            return Profile::query()->paginate($perPage);
        }
        /** @var LengthAwarePaginator $profiles */
        $profiles = Profile::query()->where("name", "like", "%{$name}%")->paginate($perPage);

        return  $profiles->withQueryString();
    }
}