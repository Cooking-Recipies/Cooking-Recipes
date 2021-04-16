<?php


namespace App\Http\Requests;


use App\Rules\PhotoExists;

class UpdateProfileRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "name" => [
                "string",
            ],
            "description" => [
                "string",
            ],
            "photo_id" => [
                "string",
                new PhotoExists($this->user()),
            ],
        ];
    }
}