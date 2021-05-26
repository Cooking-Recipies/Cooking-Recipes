<?php

declare(strict_types=1);

namespace App\Services\Account;

use App\Models\User;
use App\Services\Account\Contracts\UserAuthenticator as Authenticator;
use App\Traits\PasswordHelper;
use Illuminate\Auth\AuthenticationException;

class UserAuthenticator implements Authenticator
{
    use PasswordHelper;

    public function login(array $credentials): string
    {
        $user = $this->getUser($credentials["email"]);
        if ($user === null || !$this->isPasswordCorrect($user, $credentials["password"])) {
            throw new AuthenticationException(__("auth.failed"));
        }

        return $user->createToken($user->email)->plainTextToken;
    }

    public function logout(User $user): void
    {
        $user->tokens()->where("id", $user->currentAccessToken()->id)->delete();
    }

    private function getUser(string $email): ?User
    {
        return User::query()->where("email", $email)->first();
    }
}