<?php

namespace App\Services\Photo\Contracts;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\UploadedFile;

interface PhotoUploader
{
    public function uploadPhoto(UploadedFile $photoFile, User $user): Photo;

}