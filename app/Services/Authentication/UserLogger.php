<?php

declare(strict_types=1);

namespace App\Services\Authentication;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;

class UserLogger implements UserLoggerInterface
{
    use HasherProvider;

    public function login(array $credentials): string
    {
        $user = $this->getUser($credentials["email"]);
        if ($user === null || !$this->isPasswordCorrect($user, $credentials["password"])) {
            throw new AuthenticationException(__("auth.failed"));
        }

        return $user->createToken($user->email)->plainTextToken;
    }

    private function getUser(string $email): ?User
    {
        return User::query()->where("email", $email)->first();
    }

    private function isPasswordCorrect(User $user, string $password): bool
    {
        return $this->hashes->check($password, $user->password);
    }
}