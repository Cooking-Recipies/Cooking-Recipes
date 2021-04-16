<?php

namespace App\Services\Profile\Getter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Profile;

class ProfileGetter implements ProfileGetterInterface
{
    public function get(?string $name): LengthAwarePaginator
    {
        if ($name === null)
        {
            return Profile::query()->paginate();
        }

      return  Profile::query()->where("name", "like", "%{$name}%")->paginate();
    }
}