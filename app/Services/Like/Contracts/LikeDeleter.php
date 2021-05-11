<?php

namespace App\Services\Like\Contracts;

use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Contracts\Liker;

interface LikeDeleter
{
    public function delete(Model $likeable, Liker $liker): void;
}