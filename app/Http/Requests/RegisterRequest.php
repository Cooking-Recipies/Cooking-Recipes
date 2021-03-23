<?php


namespace App\Http\Requests;


class RegisterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "email" => [
                "email:rfc,dns",
                "unique:users",
            ],
            "password" => [
                "required",
                "string",
                "min:6",
                "confirmed",
            ],
        ];
    }
}