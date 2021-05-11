<?php

declare(strict_types=1);

namespace App\Services\Account\Contracts;

interface UserRegister
{
    public function register(array $credentials);
}