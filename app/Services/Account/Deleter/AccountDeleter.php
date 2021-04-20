<?php

namespace App\Services\Account\Deleter;

use App\Models\User;
use App\Services\Authentication\HasherProvider;
use Dotenv\Exception\ValidationException;

class AccountDeleter implements AccountDeleterInterface
{
    use HasherProvider;

    public function deleteAccount(string $password, User $user): void
    {
        if (!$this->isPasswordCorrect($user, $password)) {
            throw new ValidationException(__("passwords.wrong"));
        }

        $user->delete();
    }
}