<?php

namespace App\Services\Like;

use App\Exceptions\ResourceException;
use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Contracts\Liker;
use App\Services\Like\Contracts\LikeCreator;

class ModelLikeCreator implements LikeCreator
{

    public function create(Model $likeable, Liker $liker): void
    {
        $result = $liker->like($likeable);

        if ($result === false) {
            throw new ResourceException(__("resources.exists"));
        }
    }
}