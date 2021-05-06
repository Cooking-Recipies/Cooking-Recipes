<?php

namespace App\Services\Like\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Contracts\Liker;

interface LikeCreator
{
    public function create(Model $likeable, Liker $liker): void;
}