<?php

declare(strict_types=1);

namespace App\Services\Account;

use App\Models\User;
use App\Services\Account\Contracts\UserRegister as Register;
use App\Traits\PasswordHelper;

class UserRegister implements Register
{
    use PasswordHelper;

    public function register(array $credentials): void
    {
        $user = User::query()->create([
            "email" => $credentials["email"],
            "password" => $this->hashes->make($credentials["password"]),
        ]);
        $user->profile()->update(["name" => $credentials["name"]]);
    }
}