<?php

namespace App\Services\Basic\Updater;

use Illuminate\Database\Eloquent\Model;

class BasicUpdater implements BasicUpdaterInterface
{
    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }
}