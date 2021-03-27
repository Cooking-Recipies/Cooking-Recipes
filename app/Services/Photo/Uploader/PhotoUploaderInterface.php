<?php

namespace App\Services\Photo\Uploader;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\UploadedFile;

interface PhotoUploaderInterface
{
    public function uploadPhoto(UploadedFile $photoFile, User $user): Photo;

}