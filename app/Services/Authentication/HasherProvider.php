<?php

declare(strict_types=1);

namespace App\Services\Authentication;

use Illuminate\Contracts\Hashing\Hasher;

trait HasherProvider
{
    protected Hasher $hashes;

    public function __construct(Hasher $hashes)
    {
        $this->hashes = $hashes;
    }
}