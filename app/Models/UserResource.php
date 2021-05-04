<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface UserResource
{
    public function user(): BelongsTo;
}