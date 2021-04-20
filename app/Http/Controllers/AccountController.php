<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\DeleteAccountRequest;
use App\Services\Account\Deleter\AccountDeleterInterface;
use App\Services\Password\PasswordServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function delete(DeleteAccountRequest $request, AccountDeleterInterface $deleter): JsonResponse
    {
        $deleter->deleteAccount($request->input("password"), $request->user());

        return response()->json([
            "message" => __("account.deleted"),
        ], Response::HTTP_OK);
    }

    public function changePassword(ChangePasswordRequest $request, PasswordServiceInterface $service): JsonResponse
    {
        $service->changePassword($request->validated(), $request->user());

        return response()->json([
            "message" => __("passwords.updated"),
        ], Response::HTTP_OK);
    }
}
