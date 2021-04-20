<?php

declare(strict_types=1);

namespace App\Services\Password;

use App\Models\User;
use App\Services\Authentication\HasherProvider;
use Dotenv\Exception\ValidationException;

class PasswordService  implements PasswordServiceInterface
{
    use HasherProvider;
    public function changePassword(array $data, User $user): void
    {
        if (!$this->isPasswordCorrect($user, $data["current_password"])) {
            throw new ValidationException(__("passwords.wrong"));
        }

        $user["password"] = $this->hashes->make($data["password"]);
        $user->save();
    }
}
