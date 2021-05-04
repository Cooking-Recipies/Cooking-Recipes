<?php

namespace App\Services\Basic\Deleter;

use Illuminate\Database\Eloquent\Model;

interface BasicDeleterInterface
{
    public function delete(Model $model): void;
}