<?php

declare(strict_types=1);

namespace App\Services\Authentication;

use App\Models\User;

class UserRegister implements UserRegisterInterface
{
    use HasherProvider;

    public function register(array $credentials): void
    {
        $user = User::query()->create([
            "email" => $credentials["email"],
            "password" => $this->hashes->make($credentials["password"]),
        ]);
        $user->profile()->update(["name" => $credentials["name"]]);
    }
}