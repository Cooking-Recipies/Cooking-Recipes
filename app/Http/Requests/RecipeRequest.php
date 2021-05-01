<?php

namespace App\Http\Requests;

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
            ]
        ];
    }
}