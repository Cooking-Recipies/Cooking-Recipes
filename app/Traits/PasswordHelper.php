<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

trait PasswordHelper
{
    protected Hasher $hashes;

    public function __construct(Hasher $hashes)
    {
        $this->hashes = $hashes;
    }

    public function isPasswordCorrect(User $user, string $password): bool
    {
        return $this->hashes->check($password, $user->password);
    }
}