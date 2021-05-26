<?php

namespace App\Http\Requests;

use App\Rules\PhotoExists;

class UpdateRecipeRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "title" => [
                "string",
            ],
            "category_id" => [
                "exists:categories,id",
            ],
            "number_of_people" => [
            ],
            "preparing_time" => [
                "string",
            ],
            "instruction" => [
                "string",
            ],
            "tags.*" => [
                "string",
            ],
            "components" => [
                "array",
            ],
            "components.*.name" => [
                "required",
                "string",
            ],
            "components.*.quantity" => [
                "required",
                "string",
            ],
            "photos.*" => [
                "string",
                new PhotoExists($this->user()),
            ],
            "main_photo" => [
                "string",
                new PhotoExists($this->user()),
            ],
        ];
    }
}