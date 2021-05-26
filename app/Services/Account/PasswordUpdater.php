<?php

declare(strict_types=1);

namespace App\Services\Account;

use App\Models\User;
use App\Traits\PasswordHelper;
use App\Services\Account\Contracts\PasswordUpdater as Updater;
use Dotenv\Exception\ValidationException;

class PasswordUpdater  implements Updater
{
    use PasswordHelper;

    public function changePassword(array $data, User $user): void
    {
        if (!$this->isPasswordCorrect($user, $data["current_password"])) {
            throw new ValidationException(__("passwords.wrong"));
        }

        $user["password"] = $this->hashes->make($data["password"]);
        $user->save();
    }
}
