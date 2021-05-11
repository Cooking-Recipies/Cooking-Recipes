<?php

namespace App\Services\Basic;

use Illuminate\Database\Eloquent\Model;
use App\Services\Basic\Contracts\BasicDeleter as Deleter;

class BasicDeleter implements Deleter
{
    public function delete(Model $model): void
    {
        $model->delete();
    }
}