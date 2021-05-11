<?php

namespace App\Services\Photo\Contracts;

use App\Models\Photo;

interface PhotoDeleter
{
    public function deletePhoto(Photo $photo): void;

}