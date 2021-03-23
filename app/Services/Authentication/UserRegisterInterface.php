<?php

declare(strict_types=1);

namespace App\Services\Authentication;

interface UserRegisterInterface
{
    public function register(array $credentials);
}