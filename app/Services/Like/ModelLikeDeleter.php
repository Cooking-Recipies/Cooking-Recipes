<?php

namespace App\Services\Like;

use App\Exceptions\ResourceException;
use App\Services\Like\Contracts\LikeDeleter ;
use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Contracts\Liker;

class ModelLikeDeleter implements LikeDeleter
{
    public function delete(Model $likeable, Liker $liker): void
    {
        $result = $liker->unlike($likeable);

        if ($result === false) {
            throw new ResourceException(__("resources.not_exists"));
        }
    }
}