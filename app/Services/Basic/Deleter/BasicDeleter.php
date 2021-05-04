<?php

namespace App\Services\Basic\Deleter;

use Illuminate\Database\Eloquent\Model;

class BasicDeleter implements BasicDeleterInterface
{
    public function delete(Model $model): void
    {
        $model->delete();
    }
}