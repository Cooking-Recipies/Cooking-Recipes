<?php

namespace App\Services\Basic;

use App\Services\Basic\Contracts\BasicUpdater as Updater;
use Illuminate\Database\Eloquent\Model;

class BasicUpdater implements Updater
{
    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }
}