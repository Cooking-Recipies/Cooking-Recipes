<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class LikeablePaginatedCollection extends PaginatedCollection
{
    protected ?User $loggedUser;

    public function __construct(LengthAwarePaginator $rate, User $loggedUser = null)
    {
        parent::__construct($rate);
        $this->loggedUser = $loggedUser;
    }
}