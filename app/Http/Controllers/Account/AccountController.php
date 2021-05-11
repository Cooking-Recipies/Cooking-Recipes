<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\DeleteAccountRequest;
use App\Services\Account\Contracts\AccountDeleter;
use App\Services\Account\Contracts\PasswordUpdater;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function delete(DeleteAccountRequest $request, AccountDeleter $deleter): JsonResponse
    {
        $deleter->delete($request->input("password"), $request->user());

        return response()->json([
            "message" => __("account.deleted"),
        ], Response::HTTP_OK);
    }

    public function changePassword(ChangePasswordRequest $request, PasswordUpdater $service): JsonResponse
    {
        $service->changePassword($request->validated(), $request->user());

        return response()->json([
            "message" => __("passwords.updated"),
        ], Response::HTTP_OK);
    }
}
