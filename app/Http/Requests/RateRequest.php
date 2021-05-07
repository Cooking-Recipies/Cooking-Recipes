<?php

namespace App\Http\Requests;

class RateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "rate" => [
                "required",
                "integer",
                "max:5",
                "min:1",
            ],
            "comment" => [
                "string",
            ],
        ];
    }
}