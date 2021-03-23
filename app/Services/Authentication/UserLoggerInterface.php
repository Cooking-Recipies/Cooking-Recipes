<?php

declare(strict_types=1);

namespace App\Services\Authentication;

interface UserLoggerInterface
{
    public function login(array $credentials): string;
}