<?php

namespace App\Services\Like;

use App\Services\Like\Interfaces\LikeGetter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Rennokki\Befriended\Contracts\Liker;

class ModelLikeGetter implements LikeGetter
{

    public function getPaginated(Liker $liker, ?string $perPage, string $modelClassName): LengthAwarePaginator
    {
        return $liker->liking($modelClassName)->paginate($perPage);
    }
}