<?php

declare(strict_types=1);

namespace App\Services\Authentication;

use App\Models\User;

class UserRegister implements UserRegisterInterface
{
    use HasherProvider;

    public function register(array $credentials): void
    {
        $credentials["password"] = $this->hashes->make($credentials["password"]);
        User::query()->create($credentials);
    }
}