<?php

namespace App\Services\Photo\Deleter;

use App\Models\Photo;

interface PhotoDeleterInterface
{
    public function deletePhoto(Photo $photo): void;

}