<?php

namespace App\Services\Account\Contracts;

use App\Models\User;

interface AccountDeleter
{
    public function delete(string $password, User $user): void;
}