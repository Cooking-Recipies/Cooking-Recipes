<?php

namespace App\Http\Requests;

use App\Rules\PhotoExists;

class RecipeRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "title" => [
                "required",
                "string",
            ],
            "category_id" => [
                "exists:categories,id",
                "required",
                ],
            "number_of_people" => [
                "required",
            ],
            "preparing_time" => [
                "required",
                "string",
            ],
            "instruction" => [
                "required",
                "string",
            ],
            "tags.*" => [
                "string",
            ],
            "components" => [
                "array",
                "required",
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
                "required",
                new PhotoExists($this->user()),
            ],
        ];
    }
}