<?php

namespace App\Http\Requests;

class DeleteAccountRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "password" => [
                "required",
                "string",
            ],
        ];
    }
}