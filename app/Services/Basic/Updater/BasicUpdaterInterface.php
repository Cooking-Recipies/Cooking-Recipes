<?php

namespace App\Services\Basic\Updater;

use Illuminate\Database\Eloquent\Model;

interface BasicUpdaterInterface
{
    public function update(Model $model, array $data): Model;
}