<?php

namespace App\Services\Account;

use App\Models\User;
use App\Services\Account\Contracts\AccountDeleter as Deleter;
use App\Services\Authentication\PasswordHelper;
use Dotenv\Exception\ValidationException;

class AccountDeleter implements Deleter
{
    use PasswordHelper;

    public function delete(string $password, User $user): void
    {
        if (!$this->isPasswordCorrect($user, $password)) {
            throw new ValidationException(__("passwords.wrong"));
        }

        $user->delete();
    }
}