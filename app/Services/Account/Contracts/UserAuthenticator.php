<?php

declare(strict_types=1);

namespace App\Services\Account\Contracts;

use App\Models\User;

interface UserAuthenticator
{
    public function login(array $credentials): string;
    public function logout(User $user): void;
}