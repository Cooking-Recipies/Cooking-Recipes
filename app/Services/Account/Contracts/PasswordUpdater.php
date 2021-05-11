<?php

declare(strict_types=1);

namespace App\Services\Account\Contracts;

use App\Models\User;

interface PasswordUpdater
{
    public function changePassword(array $data, User $user): void;
}
