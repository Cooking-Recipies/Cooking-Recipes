<?php

namespace App\Services\Account\Deleter;

use App\Models\User;

interface AccountDeleterInterface
{
    public function deleteAccount(string $password, User $user): void;
}