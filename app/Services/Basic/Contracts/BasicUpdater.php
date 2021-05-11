<?php

namespace App\Services\Basic\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BasicUpdater
{
    public function update(Model $model, array $data): Model;
}