<?php

namespace App\Services\Basic\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BasicDeleter
{
    public function delete(Model $model): void;
}